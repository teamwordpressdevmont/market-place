<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'features',
        'price',
        'clip_number',
        'free_clip_number',
        'binding_period',
        'profile_type',
        'google_visibility',
        'search_visibility',
        'messaging_system',
        'notification_system',
        'priority_support',
        'tag',
        'highlighted',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'google_visibility' => 'boolean',
        'search_visibility' => 'boolean',
        'messaging_system' => 'boolean',
        'notification_system' => 'boolean',
        'priority_support' => 'boolean',
        'tag' => 'boolean',
        'highlighted' => 'boolean',
    ];
    
    public function tradepersonSubscriptions()
    {
        return $this->hasMany(TradepersonSubscription::class, 'subscription_id', 'id');
    }
}
