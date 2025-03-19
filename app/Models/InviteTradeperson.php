<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class InviteTradeperson extends Model
{
    use HasFactory;
    
    protected $table = "invite_tradepersons";
 
    protected $fillable = ['order_id','customer_id','tradeperson_id'];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
