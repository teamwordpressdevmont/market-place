<?php

namespace App\Models;

use App\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Category extends Model
{
    //
    use HasFactory, Helper;

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

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? $this->getFullImageUrl('category-images', $value) : null
        );
    }
}