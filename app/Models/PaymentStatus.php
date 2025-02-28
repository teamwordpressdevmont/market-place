<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PaymentStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_status', 'id');
    }
    
}
