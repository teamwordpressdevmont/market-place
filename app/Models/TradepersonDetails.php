<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradepersonDetails extends Model
{
    use HasFactory;
    
    protected $table = 'tradeperson_details';
    protected $fillable = ['tradeperson_id', 'about', 'services', 'portfolio', 'certifications'];
    
    protected $casts = [
        'portfolio' => 'array',
        'certifications' => 'array',
    ];
    
    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id');
    }
}
