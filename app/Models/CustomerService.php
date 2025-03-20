<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'features',
        'price',
        'options',
        'option_data',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];   
    
    public function purchases()
    {
        return $this->hasMany(CustomerServicePurchase::class, 'service_id', 'id');
    }

}
