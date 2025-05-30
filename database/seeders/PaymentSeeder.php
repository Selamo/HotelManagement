<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run()
    { 
        Payment::factory()->count(30)->create();// Creates 30 fake payments
    }
}

