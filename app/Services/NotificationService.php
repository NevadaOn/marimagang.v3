<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Admin;

class NotificationService
{
    // Konstanta untuk tipe notifikasi
    const TYPE_REGISTRATION = 'registration';
    const TYPE_PROFILE_UPDATE = 'profile_update';
    const TYPE_INTERNSHIP_SUBMITTED = 'internship_submitted';
    const TYPE_ADMIN1_PENDING = 'admin1_pending';
    const TYPE_ADMIN1_APPROVED = 'admin1_approved';
    const TYPE_ADMIN1_REJECTED = 'admin1_rejected';
    const TYPE_BIDANG_PENDING = 'bidang_pending';
    const TYPE_BIDANG_APPROVED = 'bidang_approved';
    const TYPE_BIDANG_REJECTED = 'bidang_rejected';
    const TYPE_ADMIN2_APPROVED = 'admin2_approved';
    const TYPE_ADMIN2_REJECTED = 'admin2_rejected';
    const TYPE_INTERNSHIP_STARTED = 'internship_started';
    const TYPE_INTERNSHIP_COMPLETED = 'internship_completed';
    const TYPE_GROUP_ASSIGNED = 'group_assigned';
    const TYPE_SKILL_ADDED = 'skill_added';

    /**
     * Membuat notifikasi baru (tanpa cek duplikat)
     */
    public function createNotification($userId, $title, $message, $type, $data = [])
    {
        return Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'data' => $data,
            'is_read' => false
        ]);
    }

    /**
     * Membuat notifikasi hanya jika belum ada yang sama (hindari duplikasi)
     */
    public function createNotificationOnce($userId, $title, $message, $type, $data = [])
    {
        $exists = Notification::where('user_id', $userId)
            ->where('type', $type)
            ->where('message', $message)
            ->where('is_read', false)
            ->exists();

        if (!$exists) {
            return $this->createNotification($userId, $title, $message, $type, $data);
        }

        return null;
    }

    public function registrationSuccess($userId)
    {
        $this->createNotificationOnce(
            $userId,
            'Registrasi Berhasil',
            'Selamat! Akun Anda telah berhasil terdaftar. Silakan lengkapi profil Anda untuk melanjutkan.',
            self::TYPE_REGISTRATION
        );

        $this->notifyAdmins(
            'Registrasi Baru',
            'Ada pengguna baru yang mendaftar. Silakan periksa dan verifikasi.',
            self::TYPE_REGISTRATION,
            ['new_user_id' => $userId]
        );
    }

    public function profileUpdated($userId, $isFirstTime = false)
    {
        $title = $isFirstTime ? 'Profil dasar sudah lengkap' : 'Profil Berhasil Diperbarui';
        $message = $isFirstTime
            ? 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.'
            : 'Profil Anda telah berhasil diperbarui.';

        $this->createNotificationOnce($userId, $title, $message, self::TYPE_PROFILE_UPDATE);
    }

    public function internshipSubmitted($userId, $internshipId)
    {
        $this->createNotificationOnce(
            $userId,
            'Pengajuan Magang Terkirim',
            'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.',
            self::TYPE_INTERNSHIP_SUBMITTED,
            ['internship_id' => $internshipId]
        );

        $this->notifyAdminByRole(
            'admin1',
            'Pengajuan Magang Baru',
            'Ada pengajuan magang baru yang perlu disetujui.',
            self::TYPE_ADMIN1_PENDING,
            ['internship_id' => $internshipId, 'user_id' => $userId]
        );
    }

    public function admin1Decision($userId, $internshipId, $isApproved, $reason = null)
    {
        if ($isApproved) {
            $this->createNotificationOnce(
                $userId,
                'Disetujui Admin 1',
                'Pengajuan magang Anda telah disetujui Admin 1. Sekarang menunggu persetujuan Bidang.',
                self::TYPE_ADMIN1_APPROVED,
                ['internship_id' => $internshipId]
            );

            $this->notifyAdminByRole(
                'bidang',
                'Pengajuan Magang Perlu Persetujuan',
                'Ada pengajuan magang yang telah disetujui Admin 1 dan perlu persetujuan Bidang.',
                self::TYPE_BIDANG_PENDING,
                ['internship_id' => $internshipId, 'user_id' => $userId]
            );
        } else {
            $message = 'Pengajuan magang Anda ditolak oleh Admin 1.';
            if ($reason) $message .= ' Alasan: ' . $reason;

            $this->createNotificationOnce(
                $userId,
                'Ditolak Admin 1',
                $message,
                self::TYPE_ADMIN1_REJECTED,
                ['internship_id' => $internshipId, 'reason' => $reason]
            );
        }
    }

    public function bidangDecision($userId, $internshipId, $isApproved, $reason = null)
    {
        if ($isApproved) {
            $this->createNotificationOnce(
                $userId,
                'Disetujui Bidang',
                'Pengajuan magang Anda telah disetujui Bidang. Sekarang menunggu persetujuan final Admin 2.',
                self::TYPE_BIDANG_APPROVED,
                ['internship_id' => $internshipId]
            );

            $this->notifyAdminByRole(
                'admin2',
                'Pengajuan Magang Perlu Persetujuan Final',
                'Ada pengajuan magang yang perlu persetujuan final dari Admin 2.',
                self::TYPE_ADMIN2_PENDING,
                ['internship_id' => $internshipId, 'user_id' => $userId]
            );
        } else {
            $message = 'Pengajuan magang Anda ditolak oleh Bidang.';
            if ($reason) $message .= ' Alasan: ' . $reason;

            $this->createNotificationOnce(
                $userId,
                'Ditolak Bidang',
                $message,
                self::TYPE_BIDANG_REJECTED,
                ['internship_id' => $internshipId, 'reason' => $reason]
            );
        }
    }

    public function admin2Decision($userId, $internshipId, $isApproved, $reason = null)
    {
        if ($isApproved) {
            $this->createNotificationOnce(
                $userId,
                'Pengajuan Magang Disetujui',
                'Selamat! Pengajuan magang Anda telah disetujui sepenuhnya.',
                self::TYPE_ADMIN2_APPROVED,
                ['internship_id' => $internshipId]
            );
        } else {
            $message = 'Pengajuan magang Anda ditolak oleh Admin 2.';
            if ($reason) $message .= ' Alasan: ' . $reason;

            $this->createNotificationOnce(
                $userId,
                'Pengajuan Magang Ditolak',
                $message,
                self::TYPE_ADMIN2_REJECTED,
                ['internship_id' => $internshipId, 'reason' => $reason]
            );
        }
    }

    public function internshipStarted($userId, $internshipId)
    {
        $this->createNotificationOnce(
            $userId,
            'Kegiatan Magang Dimulai',
            'Kegiatan magang Anda telah dimulai. Selamat bekerja!',
            self::TYPE_INTERNSHIP_STARTED,
            ['internship_id' => $internshipId]
        );
    }

    public function internshipCompleted($userId, $internshipId)
    {
        $this->createNotificationOnce(
            $userId,
            'Kegiatan Magang Selesai',
            'Selamat! Kegiatan magang Anda telah selesai.',
            self::TYPE_INTERNSHIP_COMPLETED,
            ['internship_id' => $internshipId]
        );

        $this->notifyAdmins(
            'Kegiatan Magang Selesai',
            'Seorang mahasiswa telah selesai menjalani kegiatan magang.',
            self::TYPE_INTERNSHIP_COMPLETED,
            ['internship_id' => $internshipId, 'user_id' => $userId]
        );
    }

    public function groupAssigned($userId, $groupName)
    {
        $this->createNotificationOnce(
            $userId,
            'Dimasukkan ke Kelompok',
            "Anda telah dimasukkan ke kelompok: {$groupName}",
            self::TYPE_GROUP_ASSIGNED,
            ['group_name' => $groupName]
        );
    }

    public function skillAdded($userId, $skillName)
    {
        $this->createNotificationOnce(
            $userId,
            'Skill Ditambahkan',
            "Skill baru telah ditambahkan ke profil Anda: {$skillName}",
            self::TYPE_SKILL_ADDED,
            ['skill_name' => $skillName]
        );
    }

    private function notifyAdmins($title, $message, $type, $data = [])
    {
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $this->createNotificationOnce($admin->user_id, $title, $message, $type, $data);
        }
    }

    private function notifyAdminByRole($role, $title, $message, $type, $data = [])
    {
        $admins = Admin::where('role', $role)->where('is_active', 1)->get();
        foreach ($admins as $admin) {
            $this->createNotificationOnce($admin->user_id, $title, $message, $type, $data);
        }
    }

    public function markAsRead($notificationId, $userId)
    {
        return Notification::where('id', $notificationId)
            ->where('user_id', $userId)
            ->update(['is_read' => true]);
    }

    public function markAllAsRead($userId)
    {
        return Notification::where('user_id', $userId)
        ->where('is_read', false) // hanya update yg belum dibaca
        ->update(['is_read' => true]);
    }

    public function getUnreadCount($userId)
    {
        return Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->count();
    }

    public function getLatestNotifications($userId, $limit = 10)
    {
        return Notification::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
