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

//    public function index()
//    {
//        $apartments = DB::table('apartments')
//            ->JOIN ('categories','apartments.category_id', '=','categories.id' )
//            ->JOIN ('wards','apartments.wards_id','=' ,'wards.id' )
//            ->JOIN ('wards',function ($join){
//               $join ->JOIN ('districts','wards.district_id', '=','districts.id' )
//                    ->JOIN ('provinces','districts.provinces_id', '=','provinces.id' );
//            })
////            ->SELECT ('apartments.name', 'apartments.price', 'apartments.description', 'apartments.bathroomNumber', 'apartments.bedroomNumber', 'apartments.photo', 'apartments.address', 'categories.name', 'wards.name','districts.name','provinces.name')
//            ->SELECT ('apartments.*', 'categories.name', 'wards.name','districts.name','provinces.name')
//            ->get();
//        return response()->json($apartments, 200);
//    }

    public function show($id)
    {
        $dataApartment = $this->apartmentService->findById($id);

        return response()->json($dataApartment['apartments'], $dataApartment['statusCode']);
    }

    public function create(Request $request)
    {
        $file = $request->file('image');
        $fileName = date('His') . '-' . $file->getClientOriginalName();
        $data = $request->all();
        $data['image'] = $fileName;

        if ($request->hasFile('image')) {
            $extension = $file->getClientOriginalExtension();
            $picture = $fileName;
            $file->move(public_path('img'), $picture);
            $dataApartment = $this->apartmentService->create($data);
            return response()->json(['dataApartment' => $dataApartment, 'message' => 'Successfully']);
        }else{
            return response()->json(['message'=> 'Select file first']);
        }
    }
}
