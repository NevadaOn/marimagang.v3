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
                ->where('status', '!=', 'dibatalkan')
                ->latest()
                ->first();

            $completionStatus = $this->getAccurateProfileCompletionStatus($user, $pengajuanAktif);

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

    private function getAccurateProfileCompletionStatus($user, $pengajuanAktif = null)
    {
        // 1. Check Profile Completion
        $profileFields = [
            'nama' => !empty($user->nama),
            'universitas_id' => !empty($user->universitas_id),
            'nim' => !empty($user->nim),
            'telepon' => !empty($user->telepon),
            'email' => !empty($user->email),
            'foto' => !empty($user->foto)
        ];
        
        $profileComplete = collect($profileFields)->every(fn($filled) => $filled === true);
        $profilePercentage = (collect($profileFields)->sum() / count($profileFields)) * 100;

        Log::info('Profile check:', [
            'user_id' => $user->id,
            'profile_fields' => $profileFields,
            'profile_complete' => $profileComplete,
            'profile_percentage' => $profilePercentage
        ]);

        // 2. Check Skills Completion
        $userSkills = $user->userSkills()->with('skill')->get();
        $skillsComplete = $userSkills->count() > 0 && $userSkills->every(function($userSkill) {
            return $userSkill->skill && 
                   !empty($userSkill->skill->nama) && 
                   !empty($userSkill->level);
        });

        Log::info('Skills check:', [
            'user_id' => $user->id,
            'skills_count' => $userSkills->count(),
            'skills_complete' => $skillsComplete,
            'skills_data' => $userSkills->map(function($skill) {
                return [
                    'skill_name' => $skill->skill->nama ?? null,
                    'level' => $skill->level ?? null
                ];
            })
        ]);

        // 3. Check Submission Status
        $submissionStatus = 'none';
        $submissionData = null;
        
        if ($pengajuanAktif) {
            $submissionStatus = $this->mapSubmissionStatus($pengajuanAktif->status);
            $submissionData = [
                'id' => $pengajuanAktif->id,
                'kode_pengajuan' => $pengajuanAktif->kode_pengajuan,
                'status' => $pengajuanAktif->status,
                'tanggal_mulai' => $pengajuanAktif->tanggal_mulai,
                'tanggal_selesai' => $pengajuanAktif->tanggal_selesai,
            ];
        }

        Log::info('Submission check:', [
            'user_id' => $user->id,
            'has_pengajuan' => $pengajuanAktif ? true : false,
            'submission_status' => $submissionStatus,
            'submission_data' => $submissionData
        ]);

        // 4. Calculate Progress Percentage
        $percentage = $this->calculateAccurateProgressPercentage(
            $profileComplete, 
            $skillsComplete, 
            $submissionStatus,
            $pengajuanAktif
        );

        // 5. Determine Current Stage and Next Step
        $stage = $this->getCurrentStage($percentage);
        $nextStep = $this->determineAccurateNextStep($profileComplete, $skillsComplete, $submissionStatus, $pengajuanAktif);

        // 6. Legacy level for backward compatibility
        $legacyLevel = $this->determineLegacyLevel($profileComplete, $skillsComplete);

        $result = [
            'level' => $legacyLevel,
            'percentage' => $percentage,
            'stage' => $stage,
            'profileComplete' => $profileComplete,
            'skillsComplete' => $skillsComplete,
            'submissionStatus' => $submissionStatus,
            'next_step' => $nextStep['text'],
            'next_action' => $nextStep['action'],
            'debug' => [
                'profile_fields' => $profileFields,
                'profile_percentage' => $profilePercentage,
                'skills_count' => $userSkills->count(),
                'pengajuan_status' => $pengajuanAktif->status ?? null,
            ]
        ];

        Log::info('Final completion status:', [
            'user_id' => $user->id,
            'result' => $result
        ]);

        return $result;
    }

    private function calculateAccurateProgressPercentage($profileComplete, $skillsComplete, $submissionStatus, $pengajuanAktif = null)
    {
        // Stage 1: Profile & Skills (5% - 10%)
        if (!$profileComplete) {
            return 5; // Profile incomplete
        } elseif ($profileComplete && !$skillsComplete) {
            return 8; // Profile complete but no skills
        } elseif ($profileComplete && $skillsComplete) {
            // Both profile and skills complete, check submission status
            switch ($submissionStatus) {
                case 'none':
                    return 10; // Ready to submit
                    
                case 'pending':
                case 'diproses':
                    return 25; // Stage 2: Pengajuan diproses
                    
                case 'progressed':
                case 'diteruskan':
                    return 40; // Stage 3: Diteruskan
                    
                case 'accepted':
                case 'diterima':
                    return 55; // Stage 4: Diterima
                    
                case 'magang':
                    // Check if internship is ongoing
                    if ($pengajuanAktif) {
                        $today = now();
                        $startDate = $pengajuanAktif->tanggal_mulai;
                        $endDate = $pengajuanAktif->tanggal_selesai;
                        
                        if ($startDate && $endDate) {
                            if ($today->gte($startDate) && $today->lte($endDate)) {
                                return 70; // Stage 5: Currently interning
                            } elseif ($today->gt($endDate)) {
                                return 85; // Should submit report
                            }
                        }
                    }
                    return 70; // Default magang stage
                    
                case 'laporan':
                    return 85; // Stage 6: Report submitted
                    
                case 'selesai':
                    return 100; // Stage 7: Completed
                    
                case 'rejected':
                case 'ditolak':
                    return 15; // Back to submission stage (lower than normal submission)
                    
                default:
                    return 10;
            }
        }
        
        return 5; // Default fallback
    }

    private function mapSubmissionStatus($originalStatus)
    {
        $statusMapping = [
            'diproses' => 'pending',
            'diteruskan' => 'progressed', 
            'ditolak' => 'rejected',
            'diterima' => 'accepted',
            'magang' => 'magang',
            'laporan' => 'laporan',
            'selesai' => 'selesai',
        ];

        return $statusMapping[$originalStatus] ?? 'none';
    }

    private function getCurrentStage($percentage)
    {
        if ($percentage <= 10) return 1;      // Profil & Skill
        if ($percentage <= 25) return 2;      // Pengajuan
        if ($percentage <= 40) return 3;      // Diteruskan
        if ($percentage <= 55) return 4;      // Diterima  
        if ($percentage <= 70) return 5;      // Magang
        if ($percentage <= 85) return 6;      // Laporan
        return 7;                             // Selesai
    }

    private function determineAccurateNextStep($profileComplete, $skillsComplete, $submissionStatus, $pengajuanAktif = null)
    {
        if (!$profileComplete) {
            return [
                'text' => 'Lengkapi Profil',
                'action' => 'profile-edit',
                'url' => route('profile.edit')
            ];
        } 
        
        if (!$skillsComplete) {
            return [
                'text' => 'Tambah Keterampilan',
                'action' => 'skills-edit',
                'url' => route('profile.edit') . '#skills'
            ];
        }
        
        switch ($submissionStatus) {
            case 'none':
                return [
                    'text' => 'Ajukan Magang',
                    'action' => 'submission-create',
                    'url' => route('pengajuan.create')
                ];
                
            case 'rejected':
                return [
                    'text' => 'Ajukan Ulang',
                    'action' => 'submission-resubmit', 
                    'url' => route('pengajuan.create')
                ];
                
            case 'pending':
                return [
                    'text' => 'Lihat Status Pengajuan',
                    'action' => 'submission-status',
                    'url' => route('pengajuan.show', $pengajuanAktif->kode_pengajuan ?? '')
                ];
                
            case 'progressed':
                return [
                    'text' => 'Menunggu Konfirmasi',
                    'action' => 'submission-waiting',
                    'url' => route('pengajuan.show', $pengajuanAktif->kode_pengajuan ?? '')
                ];
                
            case 'accepted':
                return [
                    'text' => 'Siap Mulai Magang',
                    'action' => 'internship-prepare',
                    'url' => route('pengajuan.show', $pengajuanAktif->kode_pengajuan ?? '')
                ];
                
            case 'magang':
                return [
                    'text' => 'Buat Logbook',
                    'action' => 'logbook-create',
                    'url' => route('logbook.index')
                ];
                
            case 'laporan':
                return [
                    'text' => 'Menunggu Evaluasi',
                    'action' => 'evaluation-waiting',
                    'url' => route('pengajuan.show', $pengajuanAktif->kode_pengajuan ?? '')
                ];
                
            case 'selesai':
                return [
                    'text' => 'Unduh Sertifikat',
                    'action' => 'certificate-download',
                    'url' => route('sertifikat.download', $pengajuanAktif->id ?? '')
                ];
                
            default:
                return [
                    'text' => 'Lihat Profile',
                    'action' => 'profile-view',
                    'url' => route('profile.show')
                ];
        }
    }

    private function determineLegacyLevel($profileComplete, $skillsComplete)
    {
        if (!$profileComplete) {
            return 'incomplete';
        } elseif (!$skillsComplete) {
            return 'profile-complete';
        } else {
            return 'skills-complete';
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

    /**
     * Debug endpoint to check user completion status
     */
    public function debugProgress()
    {
        if (!app()->environment('local')) {
            abort(404);
        }

        $user = auth()->user();
        $user->load(['universitas', 'userSkills.skill', 'pengajuanMagang.databidang']);

        $pengajuanAktif = $user->pengajuanMagang()
            ->where('status', '!=', 'dibatalkan')
            ->latest()
            ->first();

        $completionStatus = $this->getAccurateProfileCompletionStatus($user, $pengajuanAktif);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'universitas_id' => $user->universitas_id,
                'nim' => $user->nim,
                'telepon' => $user->telepon,
                'foto' => $user->foto,
                'skills_count' => $user->userSkills->count(),
            ],
            'pengajuan_aktif' => $pengajuanAktif ? [
                'id' => $pengajuanAktif->id,
                'kode_pengajuan' => $pengajuanAktif->kode_pengajuan,
                'status' => $pengajuanAktif->status,
                'tanggal_mulai' => $pengajuanAktif->tanggal_mulai,
                'tanggal_selesai' => $pengajuanAktif->tanggal_selesai,
            ] : null,
            'completion_status' => $completionStatus
        ]);
    }
}