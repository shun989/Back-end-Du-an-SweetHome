<?php

namespace Database\Seeders;

//use App\Models\Apartment;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\District;
use App\Models\Image;
use App\Models\Province;
use App\Models\Status;
use App\Models\User;
use App\Models\Ward;
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
        Category::factory()->count(5)->create();
        User::factory()->count(50)->create();
        Status::factory()->count(10)->create();
        Province::factory()->count(50)->create();
        District::factory()->count(50)->create();
        Ward::factory()->count(100)->create();
        Apartment::factory()->count(50)->create();
        Image::factory()->count(50)->create();
    }
}
