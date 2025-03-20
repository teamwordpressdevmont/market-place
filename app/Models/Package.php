<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = ['name', 'description', 'price', 'features'];

    protected $appends = ["tag", "highlighted" , "period" , "formated_price"];



    // One Package can be purchased many times (One-to-Many)
    public function purchasePackages()
    {
        return $this->hasMany(PurchasePackage::class, 'package_id');
    }

    // Many-to-Many (Indirect) - Get customers who purchased this package
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'purchase_packages', 'package_id', 'customer_id');
    }

    public function getFeaturesAttribute($value)
    {
        $features = is_string($value) ? json_decode($value, true) : $value;

        if (!is_array($features)) {
            return [];
        }

        $result = [];

        foreach ($features as $key => $feature) {
            if (is_string($feature)) {
                $result[] = $feature;
            } elseif (is_array($feature) && isset($feature['heading'])) {
                $result[] = $feature['heading'];
            } elseif (is_string($key) && strpos($key, 'features_') === 0 && is_array($feature) && isset($feature['heading'])) {
                $result[] = $feature['heading'];
            }
        }

        return $result;
    }



    public function getFormatedPriceAttribute($value)
    {
        return '$' . $this->price;
    }

    public function getTagAttribute()
    {
        return $this->id == 3 ? "Most Popular" : ""; 
    }

    public function getHighlightedAttribute()
    {
        return $this->id == 3 ?  true: false;
    }
    
    public function getPeriodAttribute()
    {
        return "month";
    }
}