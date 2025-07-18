<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databidang extends Model
{
    use HasFactory;

    protected $table = 'databidang';

    protected $fillable = [
        'admin_id',
        'nama',
        'slug',
        'thumbnail',
        'photo',
        'deskripsi',
        'status',
        'kuota',
        'kuota_terisi',
    ];

    protected $casts = [
        'kuota' => 'integer',
        'kuota_terisi' => 'integer',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class)->withDefault([
            'name' => 'Tidak diketahui',
        ]);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'databidang_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'databidang_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isAktif()
    {
        return $this->status === 'aktif';
    }
}
