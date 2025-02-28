<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $fillable = ['token' , 'previous_token' ,'expires_at' ,'previous_expires_at'];
    
}
