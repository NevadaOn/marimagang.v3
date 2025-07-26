<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'message', 'type', 'is_read', 'data'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'data' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function markAsRead()
    {
        return $this->update(['is_read' => true]);
    }

    public function isRead()
    {
        return $this->is_read;
    }

    public function isUnread()
    {
        return !$this->is_read;
    }

    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public static function createNotification($userId, $title, $message, $type = 'info', $data = null)
    {
        return self::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'data' => $data,
            'is_read' => false
        ]);
    }

    public static function createGroupInvitation($userId, $pengajuanId, $inviterName)
    {
        return self::createNotification(
            $userId,
            'Undangan Bergabung Kelompok',
            "Anda diundang untuk bergabung dalam kelompok magang oleh {$inviterName}",
            'invitation',
            ['pengajuan_id' => $pengajuanId]
        );
    }

    public static function createStatusUpdate($userId, $pengajuanId, $oldStatus, $newStatus)
    {
        $statusMessages = [
            'pending' => 'Pengajuan magang Anda sedang menunggu review',
            'sedang_direview' => 'Pengajuan magang Anda sedang direview oleh admin',
            'disetujui_admin1' => 'Pengajuan magang Anda telah disetujui admin, menunggu persetujuan bidang',
            'disetujui_bidang' => 'Pengajuan magang Anda telah disetujui bidang, menunggu persetujuan admin 2',
            'diterima' => 'Selamat! Pengajuan magang Anda telah diterima',
            'sedang_magang' => 'Selamat! Anda sudah dapat memulai kegiatan magang',
            'selesai' => 'Kegiatan magang Anda telah selesai',
            'ditolak' => 'Pengajuan magang Anda ditolak, silakan ajukan kembali'
        ];

        return self::createNotification(
            $userId,
            'Status Pengajuan Diperbarui',
            $statusMessages[$newStatus] ?? "Status pengajuan Anda berubah menjadi {$newStatus}",
            $newStatus === 'ditolak' ? 'error' : ($newStatus === 'diterima' ? 'success' : 'info'),
            [
                'pengajuan_id' => $pengajuanId,
                'old_status' => $oldStatus,
                'new_status' => $newStatus
            ]
        );
    }
}
