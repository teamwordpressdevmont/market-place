<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TradepersonContractUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tradeperson_id',
        'total_contracts',
        'available_contracts',
        'used_contracts',
        'reset_date',
        'last_reset_date',
    ];

    protected $casts = [
        'reset_date'      => 'date',
        'last_reset_date' => 'date',
    ];

    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }
    
}
