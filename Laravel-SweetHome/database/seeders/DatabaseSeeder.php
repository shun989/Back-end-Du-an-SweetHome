<?php

namespace Database\Seeders;

//use App\Models\Apartment;
use App\Models\Apartment;
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
        Apartment::factory()
            ->count(50)
            ->create();
    }
}
