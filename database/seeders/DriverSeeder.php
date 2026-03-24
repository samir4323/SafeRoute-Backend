<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create(['full_name' => 'Samir Rifi', 'license_number' => 'LF12345', 'phone' => '0661223344']);
        Driver::create(['full_name' => 'Ahmed Alami', 'license_number' => 'LF98765', 'phone' => '0665998877']);
    }
}
