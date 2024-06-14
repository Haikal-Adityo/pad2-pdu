<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Well;
use App\Models\Company; // Import Company model if not already imported

class WellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch company for seeding wells
        $company = Company::first();

        if ($company) {
            // Example: Seed 10 Wells
            for ($i = 1; $i <= 10; $i++) {
                Well::create([
                    'company_id' => $company->company_id,
                    'well_name' => 'Well ' . $i,
                    'well_location' => 'Location ' . $i,
                ]);
            }
        }
    }
}
