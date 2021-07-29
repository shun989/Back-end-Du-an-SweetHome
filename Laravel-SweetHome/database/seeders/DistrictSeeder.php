<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = new District();
        $district->id = 1;
        $district->name = "Bình Chánh";
        $district->prefix = "Huyện";
        $district->province_id = 1;

        $district = new District();
        $district->id = 2;
        $district->name = "Phú Nhuận";
        $district->prefix = "Quận";
        $district->province_id = 1;

        $district = new District();
        $district->id = 3;
        $district->name = "Cầu Giấy";
        $district->prefix = "Quận";
        $district->province_id = 2;

        $district = new District();
        $district->id = 4;
        $district->name = "Đống Đa";
        $district->prefix = "Quận";
        $district->province_id = 2;

        $district = new District();
        $district->id = 5;
        $district->name = "Liên Chiếu";
        $district->prefix = "Quận";
        $district->province_id = 3;
    }
}
