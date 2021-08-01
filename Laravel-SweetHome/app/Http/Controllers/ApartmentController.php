<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    function index(){
        $apartment = Apartment::all();
        return response()->json($apartment, 200);
    }

    function store(AddApartmentRequest $request)
    {
        $apartment = new Apartment();
        $apartment->fill($request->all());
        $apartment->save();
        $statusCode = 201;
        if (!$apartment)
            $statusCode = 404;
        return response($apartment, $statusCode);
    }
    function show($id){
        $apartment = Apartment::findOrFail($id);
        $statusCode = 200;
        if (!$apartment)
            $statusCode = 404;
        return response()->json($apartment, $statusCode);
    }
    function update(UpdateApartmentRequest $request, $id){

        $categories = Apartment::findOrFail($id);
        $categories->fill($request->all());
        $categories->save();
        $statusCode = 200;
        if (!$categories)
            $statusCode = 404;
        return response()->json($categories, $statusCode);
    }
    function destroy($id){
        $user = Apartment::find($id);

        if (is_null($user)) {
            return response()->json([
                'error' => true,
                'message' => "Record with id # $id not found",
            ], 404);
        }

        $user->delete();

        return response()->json([
            'error' => false,
            'message' => "Customer record successfully deleted id # $id",
        ], 200);
    }

}
