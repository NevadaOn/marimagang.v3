<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skill';

    protected $fillable = [
        'databidang_id',
        'nama',
        'deskripsi',
        'is_required',
        'judul_proyek',
        'file_path',        
        'link_project',
    ];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    public function databidang()
    {
        return $this->belongsTo(Databidang::class);
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function isProject(): bool
    {
        return !is_null($this->file_path) || !is_null($this->link_project);
    }
}
