<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $table = 'user_notifications';
    protected $fillable = ['notification_id', 'reference_link' , 'user_id', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->belongsTo(Notification::class, 'notification_id', 'id');
    }
}
