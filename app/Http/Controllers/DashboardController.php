<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pengajuan;
use App\Models\Databidang;
use App\Models\Logbook;
use App\Models\Anggota;
use App\Models\Notification;
use App\Services\NotificationService;

class DashboardController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

   public function index()
{
    try {
        $user = auth()->user();
        $user->load(['universitas', 'userSkills.skill', 'pengajuanMagang.databidang']);

        $pengajuanAktif = $user->pengajuanMagang()
            ->where('status', '!=', 'dibatalkan') // atau hilangkan ini jika ingin status dibatalkan dihitung
            ->latest()
            ->first();

        $completionStatus = $this->getProfileCompletionStatus($user);

        $submissionStatus = 'none';
        $submissionPercentage = 0;

        if ($pengajuanAktif) {
            switch ($pengajuanAktif->status) {
                case 'diproses':
                    $submissionStatus = 'pending';
                    $submissionPercentage = 75;
                    break;
                case 'diteruskan':
                    $submissionStatus = 'progressed';
                    $submissionPercentage = 85;
                    break;
                case 'ditolak':
                    $submissionStatus = 'rejected';
                    $submissionPercentage = 75;
                    break;
                case 'diterima':
                case 'magang':
                    $submissionStatus = 'accepted';
                    $submissionPercentage = 100;
                    break;
                default:
                    $submissionStatus = 'none';
                    $submissionPercentage = 0;
                    break;
            }
        }

$completionStatus['submissionStatus'] = $submissionStatus;

if (!$completionStatus['profileComplete']) {
    // profil belum lengkap, percentage tetap apa adanya (misal 33)
    // tidak perlu ubah apa-apa
} else {
    // profil sudah lengkap
    if ($submissionStatus === 'none') {
        $completionStatus['percentage'] = 50;
    } else {
        $completionStatus['percentage'] = max($completionStatus['percentage'], $submissionPercentage);
    }
}


        $completionStatus['submissionPercentage'] = $submissionPercentage;

        // Notifikasi
        $notifications = [];
        $unreadCount = 0;
        try {
            $notifications = $this->notificationService->getLatestNotifications($user->id, 5);
            $unreadCount = $this->notificationService->getUnreadCount($user->id);
        } catch (\Exception $e) {
            Log::warning('Error getting notifications: ' . $e->getMessage());
        }

        return view('dashboard', compact(
            'pengajuanAktif',
            'completionStatus',
            'notifications',
            'unreadCount'
        ));
    } catch (\Exception $e) {
        Log::error('Dashboard error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat dashboard.');
    }
}

private function getProfileCompletionStatus($user)
{
    $hasUniversityInfo = !empty($user->universitas_id) &&
                        !empty($user->telepon) &&
                        !empty($user->nim) &&
                        !empty($user->foto);

    $hasValidSkills = $user->userSkills->isNotEmpty() &&
        $user->userSkills->every(function($userSkill) {
            return $userSkill->skill &&
                   !empty($userSkill->skill->nama) &&
                   !empty($userSkill->level);
        });

    if (!$hasUniversityInfo) {
        return [
            'level' => 'incomplete',
            'percentage' => 33,
            'profileComplete' => false,
            'next_step' => 'Complete Personal Information',
            'next_action' => 'profile-edit',
        ];
    } elseif (!$hasValidSkills) {
        return [
            'level' => 'profile-complete',
            'percentage' => 66,
            'profileComplete' => true,
            'next_step' => 'Add Your Skills',
            'next_action' => 'skills-edit',
        ];
    } else {
        return [
            'level' => 'skills-complete',
            'percentage' => 100,
            'profileComplete' => true,
            'next_step' => 'View Profile',
            'next_action' => 'profile',
        ];
    }
}

    
    public function markNotificationRead($notificationId)
    {
        try {
            if (class_exists('App\\Models\\Notification')) {
                $notification = Notification::where('id', $notificationId)
                    ->where('user_id', Auth::id())
                    ->first();

                if ($notification) {
                    $notification->update(['is_read' => true]);
                    return response()->json(['success' => true]);
                }
            }

            return response()->json(['success' => false, 'message' => 'Notifikasi tidak ditemukan']);

        } catch (\Exception $e) {
            Log::error('Error marking notification as read: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan']);
        }
    }

    // private function getProfileCompletionStatus($user)
    // {
    //     $hasUniversityInfo = !empty($user->universitas_id) && 
    //                         !empty($user->telepon) && 
    //                         !empty($user->nim) &&
    //                         !empty($user->foto);

    //     $hasValidSkills = $user->userSkills->isNotEmpty() &&
    //         $user->userSkills->every(function($userSkill) {
    //             return $userSkill->skill && 
    //                 !empty($userSkill->skill->nama) && 
    //                 !empty($userSkill->level);
    //         });

    //     if (!$hasUniversityInfo) {
    //         return [
    //             'level' => 'incomplete',
    //             'percentage' => 33,
    //             'next_step' => 'Complete Personal Information',
    //             'next_action' => 'profile-edit'
    //         ];
    //     } elseif (!$hasValidSkills) {
    //         return [
    //             'level' => 'profile-complete',
    //             'percentage' => 66,
    //             'next_step' => 'Add Your Skills',
    //             'next_action' => 'skills-edit'
    //         ];
    //     } else {
    //         return [
    //             'level' => 'skills-complete',
    //             'percentage' => 100,
    //             'next_step' => 'View Profile',
    //             'next_action' => 'profile'
    //         ];
    //     }
    // }

    private function createNotification($userId, $title, $message)
    {
        try {
            if (class_exists('App\\Models\\Notification')) {
                Notification::createNotification($userId, $title, $message, 'info');
            }
        } catch (\Exception $e) {
            Log::error('Error creating notification: ' . $e->getMessage());
        }
    }
}