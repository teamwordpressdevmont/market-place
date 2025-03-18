<?php

namespace App\Models;

use App\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;



class OrderDetail extends Model
{
    use HasFactory , Helper;

    protected $fillable = [
        'order_id',
        'title',
        'description',
        'budget',
        'urgent',
        'urgent_price',
        'job_start_timeline',
        'job_end_timeline',
        'location',
        'address',
        'image',
        'additional_notes',
        'featured'
    ];

    protected $appends = ['status'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }


    public function getStatusAttribute()
    {
        return $this->urgent == 1 ? "Urgent" : "flexible";
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => collect(json_decode($value, true))
                ->map(fn($img) => $this->getFullImageUrl('order_images', $img))
                ->toArray()
        );
    }
}