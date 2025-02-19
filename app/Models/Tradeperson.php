<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tradeperson extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'business_name', 'description', 'phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tradeperson_categories', 'tradeperson_id', 'category_id');
    }
}
