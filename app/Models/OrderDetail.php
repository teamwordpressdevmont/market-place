<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderDetail extends Model
{
     use HasFactory;

    protected $fillable = [
        'order_id', 'title', 'description', 'budget', 'job_start_time', 'job_end_time', 'location',
        'image', 'additional_notes', 'featured'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
}
