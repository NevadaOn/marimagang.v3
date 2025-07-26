<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $fillable = [
        'judul_kegiatan',
        'judul_project',
        'deskripsi',
    ];

    public function images()
    {
        return $this->hasMany(DocumentationImage::class);
    }
}
