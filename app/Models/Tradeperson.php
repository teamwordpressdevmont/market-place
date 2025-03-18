<?php

namespace App\Models;

use App\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Tradeperson extends Model
{
    //
    use HasFactory, Helper;

    protected $table = "tradepersons";

    protected $fillable = ['user_id', 'first_name', 'last_name', 'nick_name', 'gender', 'phone', 'city', 'postal_code', 'latitude', 'longitude', 'about_me', 'service', 'address', 'portfolio', 'certificate', 'banner', 'featured'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tradeperson_categories', 'tradeperson_id', 'category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'tradeperson_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(TradepersonReview::class, 'tradeperson_id', 'id');
    }

    public function proposals()
    {
        return $this->hasOne(Proposal::class, 'tradeperson_id', 'id');
    }


    // Accessor for Portfolio (Convert JSON to full URLs)
    protected function portfolio(): Attribute
    {
        return Attribute::make(
            get: fn($value) => collect(json_decode($value, true))
                ->map(fn($image) => $this->getFullImageUrl('tradeperson_portfolio', $image))
                ->toArray()
        );
    }

    // Accessor for Certificate
    protected function certificate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFullImageUrl('tradeperson_certificate', $value)
        );
    }

    // Accessor for Banner
    protected function banner(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->getFullImageUrl('tradeperson_banner', $value)
        );
    }
}