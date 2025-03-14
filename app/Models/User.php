<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'user_approved',
        'avatar',
        'google_id',
        'google_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function tradeperson()
    {
        return $this->hasOne(Tradeperson::class, 'user_id', 'id');
    }
    
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id', 'id');
    }
    
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }
    
    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }
    
    public function approvedTestimonials()
    {
        return $this->hasMany(ApprovedTestimonial::class, 'user_id', 'id');
    }
}