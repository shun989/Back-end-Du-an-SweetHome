<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    function index()
    {
        $ward = Ward::all();
        return response()->json($ward, 200);
    }

//    function indexOfDistrict($id){
//        $data = DB::table('wards')
//            ->JOIN('districts', 'wards.district_id', '=', 'districts.id')
//            ->JOIN('provinces', 'districts.provinces_id', '=', 'provinces.id')
//            ->WHERE('districts.id', '=', "$id")
//            ->get();
//        return response()->json($data, 200);
//    }

    function wardOfDistrict($id)
    {
        $data = DB::table('wards')
            ->JOIN('districts', 'wards.district_id', '=', 'districts.id')
            ->JOIN('provinces', 'districts.provinces_id', '=', 'provinces.id')
            ->WHERE('districts.id', '=', "$id")
            ->get();
        return response()->json($data, 200);

    }

    function show($id)
    {
        $ward = Ward::findOrFail($id);
        $statusCode = 200;
        if (!$ward)
            $statusCode = 404;
        return response()->json($ward, $statusCode);
    }
}
