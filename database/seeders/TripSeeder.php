<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
        'driver_id' => 1, 
        'vehicle_id' => 1,
        'start_point' => 'Fes',
        'end_point' => 'Casablanca',
        'distance' => 290,
        'fuel_consumed' => 80
        ]);
    }
}
