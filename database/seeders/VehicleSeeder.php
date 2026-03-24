<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            "plate_number"=>"12-A-1234",
            "model"=>"Volvo FH16",
            "status"=>"active",
        ]);
        Vehicle::create(['plate_number' => '56-B-5678', 'model' => 'Scania R500', 'status' => 'active']);
    }
}
