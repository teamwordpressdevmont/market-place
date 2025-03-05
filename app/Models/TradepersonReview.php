<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TradepersonReview extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'tradeperson_id', 'order_id', 'review', 'rating' , 'approved'];

    // Relationship with User (Reviewer)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    // Relationship with Tradeperson
    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
