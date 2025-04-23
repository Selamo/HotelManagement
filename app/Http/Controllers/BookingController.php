<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $room = Room::findOrFail($request->room_id);
        $days = now()->parse($request->check_in_date)->diffInDays(now()->parse($request->check_out_date));
        $total = $room->price_per_night * $days;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $room->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        $room->update(['status' => 'booked']);

        return redirect()->route('bookings.index')->with('success', 'Booking created.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        return view('bookings.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
        ]);

        $room = Room::findOrFail($request->room_id);
        $days = now()->parse($request->check_in_date)->diffInDays(now()->parse($request->check_out_date));
        $total = $room->price_per_night * $days;

        $booking->update([
            'room_id' => $room->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $total,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated.');
    }

    public function destroy(Booking $booking)
    {
        $booking->room->update(['status' => 'available']);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled.');
    }
}

