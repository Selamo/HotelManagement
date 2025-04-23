<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingServiceController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $booking->services()->attach($request->service_id, [
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Service added to booking.');
    }
}

