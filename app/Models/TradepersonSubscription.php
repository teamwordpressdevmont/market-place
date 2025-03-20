<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TradepersonSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['tradeperson_id', 'subscription_id', 'start_date', 'end_date', 'status_id'];

    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(SubscriptionStatus::class, 'status_id', 'id');
    }
}
