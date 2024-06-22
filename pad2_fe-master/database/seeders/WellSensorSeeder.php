<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WellSensor;

class WellSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            WellSensor::create([
                'well_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
