<?php

use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Admin Registration Routes
Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

  Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('rooms', RoomController::class);
});
Route::resource('bookings', BookingController::class);
Route::resource('payments', PaymentController::class);
Route::resource('services', ServiceController::class);
Route::post('bookings/{booking}/services', [BookingServiceController::class, 'store'])->name('bookings.services.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('rooms/available', [RoomController::class, 'available'])->name('admin.rooms.available');
    Route::get('rooms/booked', [RoomController::class, 'booked'])->name('admin.rooms.booked');

    Route::resource('bookings', BookingController::class);
    Route::resource('payments', PaymentController::class);

    Route::get('rooms/available', [RoomController::class, 'available'])->name('rooms.available');
    Route::get('rooms/booked', [RoomController::class, 'booked'])->name('rooms.booked');

    // Bookings
    Route::resource('bookings', BookingController::class);

    // Payments
    Route::resource('payments', PaymentController::class);

    // Revenue
    Route::get('revenue', [RevenueController::class, 'index'])->name('revenue.index');

    // Users
    Route::resource('users', UserController::class);
    Route::get('/admin/rooms/available', [RoomController::class, 'available'])->name('admin.rooms.available');

    Route::get('/admin/rooms/booked', [RoomController::class, 'booked'])->name('admin.rooms.booked');
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/admin/revenue', [RevenueController::class, 'index'])->name('admin.revenue.index');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
