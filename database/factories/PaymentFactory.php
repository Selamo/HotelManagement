<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'booking_id' => \App\Models\Booking::factory(),
            'amount' => $this->faker->numberBetween(50, 500),
            'status' => $this->faker->randomElement(['paid', 'pending']),
            'payment_date' => $this->faker->dateTimeThisYear(),
        ];
    }
}

