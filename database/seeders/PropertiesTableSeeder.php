<?php

namespace Database\Seeders;

use App\Models\Properties; //import the property model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; //import Storage facade

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Property
        Properties::create([
            'name' => 'Beach House in Spain',
            'description' => 'Beautiful beach house by the sea in Spain near Barcelona.',
            'price_per_night' => 150.00,
            'image_url' => Storage::url('app/public/Beach House.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Cozy Cottage in England',
            'description' => 'Cozy cottage in the countryside of England',
            'price_per_night' => 250.00,
            'image_url' => Storage::url('public/Cottage House.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Luxurious Penthouse in New-York',
            'description' => 'Spacious penthouse in New-York overlooking Central Park',
            'price_per_night' => 500.00,
            'image_url' => Storage::url('public/luxury apartment.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Luxurious Villa in Italy',
            'description' => 'Luxurious villa in Capry',
            'price_per_night' => 1500.00,
            'image_url' => Storage::url('public/Villa.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Country House in France',
            'description' => 'Enjoy the French Country house and visit the vineyards nearby.',
            'price_per_night' => 700.00,
            'image_url' => Storage::url('public/Country House.jpg'), // Using Storage::url() to get the correct path
        ]);
    }
}
