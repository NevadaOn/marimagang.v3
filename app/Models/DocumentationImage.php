<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationImage extends Model
{
    protected $fillable = [
        'documentation_id',
        'image_path',
        'caption',
    ];

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}
