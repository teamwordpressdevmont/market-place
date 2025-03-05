<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'status'
    ];
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status', 'id');
    }
    
}
