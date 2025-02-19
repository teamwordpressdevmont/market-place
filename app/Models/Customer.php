<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'city', 'country'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
