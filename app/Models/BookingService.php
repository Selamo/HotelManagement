<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    public function booking()
{
    return $this->belongsTo(Booking::class);
}

public function service()
{
    return $this->belongsTo(Service::class);
}
}
