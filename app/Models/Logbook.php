<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logbook extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'kegiatan',
    ];

    protected $dates = ['tanggal'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
