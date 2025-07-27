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

    // Update method index() untuk mengirim data completion yang lebih detail
    public function index()
    {
        try {
            $user = auth()->user();
            $user->load(['universitas', 'userSkills.skill', 'pengajuanMagang.databidang', 'pengajuanMagang.anggota.user']);

            $pengajuanAktif = $user->pengajuanMagang()
                ->where('status', '!=', 'ditolak')
                ->with(['databidang', 'anggota.user', 'user'])
                ->latest()
                ->first();

            $undanganPengajuan = null;
            if (!$pengajuanAktif) {
                $undanganPengajuan = Anggota::where('user_id', $user->id)
                    ->where('status', 'pending')
                    ->with(['pengajuan.user', 'pengajuan.databidang'])
                    ->first();
            }

            // Get detailed completion status
            $completionStatus = $this->getProfileCompletionStatus($user);

            $notifications = [];
            $unreadCount = 0;
            
            try {
                $notifications = $this->notificationService->getLatestNotifications($user->id, 5);
                $unreadCount = $this->notificationService->getUnreadCount($user->id);
                
                if ($undanganPengajuan) {
                    $unreadCount++;
                }
            } catch (\Exception $e) {
                Log::warning('Error getting notifications: ' . $e->getMessage());
            }

            return view('dashboard', compact(
                'pengajuanAktif',
                'undanganPengajuan', 
                'completionStatus',
                'notifications', 
                'unreadCount'
            ));

        } catch (\Exception $e) {
            Log::error('Dashboard error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat dashboard.');
        }
    }
    public function acceptInvitation($anggotaId)
    {
        try {
            $anggota = Anggota::findOrFail($anggotaId);

            if ($anggota->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melakukan aksi ini.');
            }

            if ($anggota->status !== 'pending') {
                return redirect()->back()->with('error', 'Undangan sudah tidak valid atau sudah diproses sebelumnya.');
            }

            $userPengajuanAktif = Auth::user()->pengajuanMagang()
                ->where('status', '!=', 'ditolak')
                ->first();

            if ($userPengajuanAktif) {
                return redirect()->back()->with('error', 'Anda sudah memiliki pengajuan magang aktif.');
            }

            $existingMembership = Anggota::where('user_id', Auth::id())
                ->where('status', 'accepted')
                ->where('id', '!=', $anggotaId)
                ->first();

            if ($existingMembership) {
                return redirect()->back()->with('error', 'Anda sudah menjadi anggota kelompok magang lain.');
            }

            $anggota->update(['status' => 'accepted']);

            $this->createNotification(
                $anggota->pengajuan->user_id,
                'Anggota Baru Bergabung',
                Auth::user()->nama . ' telah menerima undangan dan bergabung ke kelompok magang Anda.'
            );

            return redirect()->back()->with('success', 'Berhasil bergabung ke kelompok magang!');

        } catch (\Exception $e) {
            Log::error('Error accepting invitation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses undangan. Silakan coba lagi.');
        }
    }

    public function rejectInvitation($anggotaId)
    {
        try {
            $anggota = Anggota::findOrFail($anggotaId);

            if ($anggota->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melakukan aksi ini.');
            }

            if ($anggota->status !== 'pending') {
                return redirect()->back()->with('error', 'Undangan sudah tidak valid atau sudah diproses sebelumnya.');
            }

            $pengajuanUserId = $anggota->pengajuan->user_id;
            $userName = Auth::user()->nama;

            $anggota->delete();

            $this->createNotification(
                $pengajuanUserId,
                'Undangan Ditolak',
                $userName . ' menolak undangan untuk bergabung ke kelompok magang Anda.'
            );

            return redirect()->back()->with('success', 'Undangan telah ditolak.');

        } catch (\Exception $e) {
            Log::error('Error rejecting invitation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses undangan. Silakan coba lagi.');
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
                'next_step' => 'Complete Personal Information',
                'next_action' => 'profile-edit'
            ];
        } elseif (!$hasValidSkills) {
            return [
                'level' => 'profile-complete',
                'percentage' => 66,
                'next_step' => 'Add Your Skills',
                'next_action' => 'skills-edit'
            ];
        } else {
            return [
                'level' => 'skills-complete',
                'percentage' => 100,
                'next_step' => 'View Profile',
                'next_action' => 'profile'
            ];
        }
    }

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