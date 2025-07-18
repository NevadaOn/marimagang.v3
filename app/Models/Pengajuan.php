<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'user_id', 'databidang_id', 'kode_pengajuan', 'deskripsi',
        'tanggal_mulai', 'tanggal_selesai', 'status', 'komentar_admin', 'nilai_akhir'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'nilai_akhir' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function databidang()
    {
        return $this->belongsTo(Databidang::class, 'databidang_id', 'id');
    }


    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function logbooks()
    {
        return $this->hasMany(Logbook::class);
    }

    public function documents()
    {
        return $this->hasMany(PengajuanDocument::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(PengajuanStatusHistory::class);
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function getRouteKeyName()
    {
        return 'kode_pengajuan';
    }
    
}