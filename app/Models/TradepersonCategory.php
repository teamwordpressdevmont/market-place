<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TradepersonCategory extends Model
{
    use HasFactory;
    
    protected $table = "tradeperson_categories";
 
    protected $fillable = ['tradeperson_id', 'category_id'];
}
