<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function index()
    {
        $province = Status::all();
        return response()->json($province, 200);
    }

    function show($id)
    {
        $province = Status::findOrFail($id);
        $statusCode = 200;
        if (!$province)
            $statusCode = 404;
        return response()->json($province, $statusCode);
    }
}
