<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    //
    use HasFactory;

    protected $fillable = ['customer_id', 'tradeperson_id', 'order_status', 'payment_status'];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    
    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }
    
    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }
    
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status', 'id');
    }
    
    public function review()
    {
        return $this->hasOne(TradepersonReview::class, 'order_id', 'id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'order_categories', 'order_id', 'category_id');
    }
    
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'order_id', 'id');
    }
    
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status', 'id');
    }
    
}
