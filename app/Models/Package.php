<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'features'];
    
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
    
}
