<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'title',
        'description',
        'budget',
        'timeline',
        'location',
        'photos',
        'additional_notes',
        'featured',
    ];

    protected $casts = [
        'photos' => 'array',
        'featured' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
