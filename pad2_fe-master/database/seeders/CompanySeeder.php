<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example data
        Company::create(['company_name' => 'Company A', 'company_address' => '123 Main St']);
        Company::create(['company_name' => 'Company B', 'company_address' => '456 Elm St']);
        // Add more companies as needed
    }
}
