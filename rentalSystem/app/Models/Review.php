<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'renter_id',
        'rating',
        'comment',
    ];

    // Relationships

    // A review belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // A review belongs to a user (renter)
    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }
}
