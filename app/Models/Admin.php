<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'role', 'is_active'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function databidang()
    {
        return $this->hasMany(\App\Models\Databidang::class, 'admin_id');
    }

    public function approvedLogbooks()
    {
        return $this->hasMany(Logbook::class, 'approved_by');
    }

    public function statusHistories()
    {
        return $this->hasMany(PengajuanStatusHistory::class);
    }
}