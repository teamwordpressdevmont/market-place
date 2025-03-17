<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = ['title', 'message', 'role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
