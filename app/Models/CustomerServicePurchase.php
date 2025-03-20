<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerServicePurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'service_id',
        'start_date',
        'end_date',
        'status_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(CustomerService::class, 'service_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(SubscriptionStatus::class, 'status_id', 'id');
    }
    
    
}
