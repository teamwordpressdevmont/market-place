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
}
