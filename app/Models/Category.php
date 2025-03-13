<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id', 'icon'];

    public function tradepersons()
    {
        return $this->belongsToMany(Tradeperson::class, 'tradeperson_categories', 'category_id', 'tradeperson_id');
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_categories', 'category_id', 'order_id');
    }
    
       public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relationship to get the parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }




}
