<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClipUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tradeperson_id',
        'total_clips',
        'available_clips',
        'used_clips',
        'reset_date',
        'last_reset_date',
    ];

    protected $casts = [
        'reset_date'        => 'date',
        'last_reset_date'   => 'date',
    ];

    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }
    
}
