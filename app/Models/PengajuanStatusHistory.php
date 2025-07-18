<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id', 'status_from', 'status_to', 'admin_id', 'keterangan'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}