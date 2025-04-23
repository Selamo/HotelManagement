<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function room()
{
    return $this->belongsTo(Room::class);
}

public function payment()
{
    return $this->hasOne(Payment::class);
}

public function services()
{
    return $this->belongsToMany(Service::class, 'booking_services')
                ->withPivot('quantity')
                ->withTimestamps();
}
}
