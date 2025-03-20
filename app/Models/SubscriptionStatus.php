<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = true;
}
