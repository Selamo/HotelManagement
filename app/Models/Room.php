<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    protected $fillable = [
        'room_number',
        'type',
        'price_per_night',
        'status',
    ];

}
