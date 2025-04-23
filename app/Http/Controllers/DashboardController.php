<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $roomCount = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $bookedRooms = Room::where('status', 'booked')->count();
        $bookingCount = Booking::count();
        $paymentCount = Payment::count();
        $revenue = Payment::where('status', 'paid')->sum('amount');
        $users = User::count();

        return view('dashboard.index', compact(
            'roomCount', 'availableRooms', 'bookedRooms',
            'bookingCount', 'paymentCount', 'revenue', 'users'
        ));
    }
}

