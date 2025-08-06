<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nim',
        'skill',
        'universitas',
        'prodi',
        'fakultas',
        'email',
        'no_hp',
        'status',
        'role',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
