<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnnouncement extends Model
{
    use HasFactory;

    protected $table = 'user_announcements';
    protected $fillable = ['announcement_id', 'user_id'];

    public function announcements()
    {
        return $this->belongsTo(Announcement::class, 'announcement_id', 'id');
    }
}