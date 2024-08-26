<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'location',
        'price_per_day',
        'availability',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A property can have multiple photos
    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    // A property can have multiple amenities
    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }

    // A property can have multiple bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A property can have multiple reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
