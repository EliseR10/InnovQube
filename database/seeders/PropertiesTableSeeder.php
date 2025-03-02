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
            'description' => 'Escape to this charming beach house located on the serene coast of Spain, just a short distance from the vibrant city of Barcelona. Relax by the sea, enjoy breathtaking ocean views, and unwind in a cozy home designed for comfort and tranquility. Perfect for a romantic getaway or a family retreat, this beach house offers a peaceful escape from the hustle and bustle.',
            'price_per_night' => 150.00,
            'image_url' => Storage::url('app/public/Beach House.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Cozy Cottage in England',
            'description' => 'Nestled in the rolling hills of the English countryside, this cozy cottage offers a perfect retreat for those seeking peace and quiet. Surrounded by lush green landscapes and traditional English charm, this cottage is an ideal place for a relaxing escape. Explore the nearby countryside, visit local pubs, or simply enjoy the warmth of the cottage on a chilly evening.',
            'price_per_night' => 250.00,
            'image_url' => Storage::url('app/public/Cottage House.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Luxurious Penthouse in New-York',
            'description' => 'Indulge in the height of luxury with this spacious penthouse offering stunning panoramic views of Central Park and the iconic New York City skyline. With its modern design, spacious living areas, and high-end finishes, this penthouse is the perfect place to stay while exploring the best of New York. Whether you’re here for business or leisure, this property offers unmatched comfort and style.',
            'price_per_night' => 500.00,
            'image_url' => Storage::url('app/public/luxury apartment.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Luxurious Villa in Italy',
            'description' => 'Experience the Italian dream in this opulent villa situated in the beautiful island of Capri. Surrounded by lush gardens and offering breathtaking views of the Mediterranean Sea, this villa offers the ultimate in luxury living. Whether lounging by the private pool, dining al fresco, or exploring the charming island, this villa is the perfect place to create unforgettable memories.',
            'price_per_night' => 1500.00,
            'image_url' => Storage::url('app/public/Villa.jpg'), // Using Storage::url() to get the correct path
        ]);
        Properties::create([
            'name' => 'Country House in France',
            'description' => 'Nestled in the heart of France’s picturesque countryside, this charming country house offers a tranquil escape. Surrounded by vineyards and rolling hills, this home is ideal for those wanting to experience authentic French living. Spend your days wine-tasting in nearby vineyards, exploring quaint villages, or relaxing by the fireplace in the warmth of this rustic yet luxurious retreat.',
            'price_per_night' => 700.00,
            'image_url' => Storage::url('app/public/Country House.jpg'), // Using Storage::url() to get the correct path
        ]);
    }
}
