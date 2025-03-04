<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderMilestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tradeperson_id',
        'milestone',
    ];

    protected $casts = [
        'milestone' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function tradeperson()
    {
        return $this->belongsTo(User::class, 'tradeperson_id', 'id');
    }
}
