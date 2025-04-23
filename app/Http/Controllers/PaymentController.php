<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::whereDoesntHave('payment')->get();
        return view('payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,pending,refunded',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
            'booking_id' => $request->booking_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
            'paid_at' => now(),
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment recorded.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,pending,refunded',
            'payment_method' => 'required|string',
        ]);

        $payment->update([
            'amount' => $request->amount,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment updated.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted.');
    }
}

