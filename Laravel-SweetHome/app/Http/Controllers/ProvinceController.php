<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    function index()
    {
        $province = Province::all();
        return response()->json($province, 200);
    }

    function show($id)
    {
        $province = Province::findOrFail($id);
        $statusCode = 200;
        if (!$province)
            $statusCode = 404;
        return response()->json($province, $statusCode);
    }
}
