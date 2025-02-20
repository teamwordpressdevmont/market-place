<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class PurchasePackage extends Model
{
    use HasFactory;

    protected $fillable = ['package_id', 'user_id'];
    
    // Belongs to a specific package
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    // Belongs to a specific customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
