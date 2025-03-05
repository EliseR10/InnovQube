<?php

namespace Database\Seeders;

use App\Models\Bookings; //import the booking model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Bookings
        Bookings::create([
            'property_id' => 1,
            'user_id' => 3,
            'start_date' => '2025-03-01',
            'end_date' => '2025-03-05'
        ]);
    }
}
