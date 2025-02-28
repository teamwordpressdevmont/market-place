<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderDetail extends Model
{
     use HasFactory;

    protected $fillable = [
        'order_id', 'title', 'description', 'budget', 'urgent', 'urgent_price', 'job_start_timeline', 'job_end_timeline', 'location', 'address',
        'image', 'additional_notes', 'featured'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
