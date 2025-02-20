<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovedTestimonial extends Model
{
    use HasFactory;

    protected $fillable = ['testimonial_id', 'user_id', 'order_number'];

    public function testimonial()
    {
        return $this->belongsTo(Testimonial::class, 'testimonial_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
