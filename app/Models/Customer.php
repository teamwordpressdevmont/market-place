<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone', 'email', 'address', 'address2', 'post_code', 'city', 'country', 'gender'];
    
    // One Customer can belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    // One Customer can purchase multiple orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
    
    // One Customer can purchase multiple packages via PurchasePackage
    public function purchasePackages()
    {
        return $this->hasMany(PurchasePackage::class, 'customer_id', 'id');
    }

    // Many-to-Many (Indirect) - Retrieve all purchased packages through purchase_packages table
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'purchase_packages', 'customer_id', 'package_id');
    }
    
    public function tradepersonReviews()
    {
        return $this->hasMany(TradepersonReview::class, 'customer_id', 'id');
    }
    
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'customer_id', 'id');
    }
    
}
