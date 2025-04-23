<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
use Notifiable;

// Add 'role' to the fillable array
protected $fillable = [
    'name',
    'email',
    'password',
    'role', // Ensure this is present
]; 
}
