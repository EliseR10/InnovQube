<?php

namespace Database\Seeders;

use App\Models\Properties; //import the property model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Property
        Properties::create([
            'name' => 'Property Test',
            'description' => 'Description of the property test',
            'price_per_night' => 150.00
        ]);
        Properties::create([
            'name' => 'Second Property Test',
            'description' => 'Description of the second property test',
            'price_per_night' => 250.00
        ]);
    }
}
