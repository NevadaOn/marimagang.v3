<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    protected $fillable = [
        'nama', 'universitas_id', 'nim', 'telepon', 'email', 'password', 'foto', 'status','bio', 'alamat',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function universitas()
    {
        return $this->belongsTo(Universitas::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function pengajuanMagang()
    {
        return $this->hasMany(Pengajuan::class);
    }
    
    public function pengajuanLatest()
    {
        return $this->hasOne(Pengajuan::class)->latestOfMany();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('default/user.png');
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function projects()
    {
        return $this->hasMany(Skill::class)->whereNotNull('judul');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    public function sentChats()
    {
        return $this->morphMany(Chat::class, 'sender');
    }

    public function receivedChats()
    {
        return $this->morphMany(Chat::class, 'receiver');
    }


}
