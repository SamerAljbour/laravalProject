<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
protected $fillable = [
    'name',
    'email',
    'password',
    'profile_picture',
    'role',
    'address',
    'phone',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // A user (renter) can have multiple bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'renter_id');
    }

    // A user (renter) can have multiple reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'renter_id');
    }

}


