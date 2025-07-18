<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id', 'document_type', 'file_name', 'file_path', 'file_size', 'uploaded_at'
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
        'file_size' => 'integer',
    ];

    public $timestamps = false;

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}