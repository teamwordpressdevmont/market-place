<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TradepersonService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'features',
        'price',
        'binding_period',
        'search_visibility',
        'recommended_tradeperson',
        'appear_homepage',
        'access_premium_tender',
        'extra_clip',
        'google_visibility',
        'contract_creation',
        'free_contract',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'recommended_tradeperson' => 'boolean',
        'appear_homepage' => 'boolean',
        'access_premium_tender' => 'boolean',
        'google_visibility' => 'boolean',
    ];
    
    public function purchases()
    {
        return $this->hasMany(TradepersonServicePurchase::class, 'tradeperson_service_id', 'id');
    }
    
    
}
