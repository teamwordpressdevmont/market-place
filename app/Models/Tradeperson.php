<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tradeperson extends Model
{
    //
    use HasFactory;

    protected $table = "tradepersons";

    protected $fillable = ['user_id', 'first_name', 'last_name', 'nick_name', 'gender', 'phone', 'city', 'postal_code', 'latitude', 'longitude','about_me', 'service', 'address', 'portfolio', 'certificate' ,'banner', 'featured'];


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
}