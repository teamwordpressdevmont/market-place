<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'heading', 'description', 'rating', 'verified'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function approvedTestimonial()
    {
        return $this->hasOne(ApprovedTestimonial::class, 'testimonial_id', 'id');
    }
}
