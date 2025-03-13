<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;


class Blog extends Model
{
    //
    use HasFactory;

    protected $fillable = ['title', 'slug' , 'banner', 'description', 'excerpt', 'publish_by', 'publish_date', 'featured'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // December 23rd, 2024
    protected function publishDate(): Attribute
    {
         return Attribute::make(
                get: fn ($value) => Carbon::parse($value)->translatedFormat('F jS, Y'),
            );  
    }
}
