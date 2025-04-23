<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function bookings()
{
    return $this->belongsToMany(Booking::class, 'booking_services')
                ->withPivot('quantity')
                ->withTimestamps();
}
}
