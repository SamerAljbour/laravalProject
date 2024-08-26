<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'renter_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    // Relationships

    // A booking belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // A booking belongs to a user (renter)
    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    // A booking has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
