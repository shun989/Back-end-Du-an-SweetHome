<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = new Province();
        $province->id = 1;
        $province->name = "Hồ Chí Minh";
        $province->code = "SG";
        $province->save();

        $province = new Province();
        $province->id = 2;
        $province->name = "Hà Nội";
        $province->code = "HN";
        $province->save();

        $province = new Province();
        $province->id = 3;
        $province->name = "Đà Nẵng";
        $province->code = "DDN";
        $province->save();
    }
}
