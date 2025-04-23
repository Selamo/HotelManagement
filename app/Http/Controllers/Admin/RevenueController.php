<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class RevenueController extends Controller
{
    public function index()
    {
        $totalRevenue = Payment::sum('amount');
        $payments = Payment::latest()->paginate(10);

        return view('admin.revenue.index', compact('totalRevenue', 'payments'));
    }
}

