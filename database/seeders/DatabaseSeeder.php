<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\ContactRole;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ContactRole::factory(10)->create();
        CompanyType::factory(10)->create();
        CompanyStatus::factory(10)->create();
        Company::factory(10000)->create();
       /// Order::factory(10)->create();
    }
}
