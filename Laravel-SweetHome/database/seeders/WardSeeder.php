<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ward = new Ward();
        $ward->id = 1;
        $ward->name = "An Phú Tây";
        $ward->prefix = "Xã";
        $ward->district_id = 1;
        $ward->save();

        $ward = new Ward();
        $ward->id = 2;
        $ward->name = "Bình Trị Đông";
        $ward->prefix = "Phường";
        $ward->district_id = 2;
        $ward->save();

        $ward = new Ward();
        $ward->id = 3;
        $ward->name = "Tân Tạo";
        $ward->prefix = "Xã";
        $ward->district_id = 2;
        $ward->save();

        $ward = new Ward();
        $ward->id = 4;
        $ward->name = "Văn Chương";
        $ward->prefix = "Xã";
        $ward->district_id = 4;
        $ward->save();

        $ward = new Ward();
        $ward->id = 5;
        $ward->name = "Quốc Tử Giám";
        $ward->prefix = "Xã";
        $ward->district_id = 4;
        $ward->save();
    }
}
