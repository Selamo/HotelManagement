<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'room_id' => \App\Models\Room::factory(), 
            'user_id' => \App\Models\User::factory(),
            'check_in' => $this->faker->dateTimeThisYear(),
            'check_out' => $this->faker->dateTimeThisYear(),
            'status' => $this->faker->randomElement(['confirmed', 'pending', 'completed']),
        ];
    }
}

