<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ApartmentService;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    protected ApartmentService $apartmentService;

    public function __construct(ApartmentService $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }

    public function index()
    {
        $apartments = DB::table('apartments')
            ->JOIN ('categories','apartments.category_id', '=','categories.id' )
            ->JOIN ('wards','apartments.wards_id','=' ,'wards.id' )
            ->JOIN ('districts','wards.district_id', '=','districts.id' )
            ->JOIN ('provinces','districts.provinces_id', '=','provinces.id' )
//            ->SELECT ('apartments.*','categories.name' , 'wards.name','districts.name','provinces.name')
            ->SELECT ('apartments.name', 'apartments.price', 'apartments.description', 'apartments.bathroomNumber', 'apartments.bedroomNumber', 'apartments.photo', 'apartments.address','categories.name', 'wards.name','districts.name','provinces.name')
            ->get();
        return response()->json($apartments, 200);
    }

    public function show($id)
    {
        $dataApartment = $this->apartmentService->findById($id);

        return response()->json($dataApartment['apartments'], $dataApartment['statusCode']);
    }


}
