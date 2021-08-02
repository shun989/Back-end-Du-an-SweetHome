<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddApartmentRequest;
use App\Http\Services\ApartmentService;
use App\Http\Services\Impl\ApartmentServiceImpl;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected ApartmentService $apartmentService;

    public function __construct(ApartmentService $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }

    function index()
    {
        $apartments = Apartment::with('user', 'status', 'category','ward')->get();
        $data = [];
        foreach ($apartments as $apartment) {
            $data[] = [
                'id' => $apartment->id,
                'name' => $apartment->name,
                'price' => $apartment->price,
                'created_at' => $apartment->created_at->format('jS F Y h:i:s A'),
                'user' => $apartment->user->name,
                'category' => $apartment->category->name,
                'image' => $apartment->photo,
                'status' => $apartment->status->name,
                'bathroom' => $apartment->bathroomNumber,
                'bedroom' => $apartment->bedroomNumber,
                'description' => $apartment->description,
                'address' => $apartment->address,
                'user_id' => $apartment->user->id,
                'ward' => $apartment->ward->name,
                'district' => $apartment->ward->district->name,
                'province' => $apartment->ward->district->province->name,
            ];
        }
        return response()->json($data, 200);
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

    function show($id)
    {
        $apartments = Apartment::with('user', 'status', 'category','ward')
            ->findOrFail($id);
        $data = [];
            $data[] = [
                'id' => $apartments->id,
                'name' => $apartments->name,
                'price' => $apartments->price,
                'created_at' => $apartments->created_at->format('jS F Y h:i:s A'),
                'user' => $apartments->user->name,
                'phone' => $apartments->user->phone,
                'category' => $apartments->category->name,
                'image' => $apartments->photo,
                'status' => $apartments->status->name,
                'bathroom' => $apartments->bathroomNumber,
                'bedroom' => $apartments->bedroomNumber,
                'description' => $apartments->description,
                'address' => $apartments->address,
                'user_id' => $apartments->user->id,
                'ward' => $apartments->ward->name,
                'district' => $apartments->ward->district->name,
                'province' => $apartments->ward->district->province->name,
            ];
        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $file = $request->file('photo');
        $fileName = date('His') . '-' . $file->getClientOriginalName();
        $data = $request->all();
        $data['photo'] = $fileName;

        if ($request->hasFile('photo')) {
            $extension = $file->getClientOriginalExtension();
            $picture = $fileName;
            $file->move(public_path('img'), $picture);
            $dataApartment = $this->apartmentService->create($data);
            return response()->json(['dataApartment' => $dataApartment, 'message' => 'Add New Apartment Successfully']);
        }else{
            return response()->json(['message'=> 'Select file first']);
        }
    }

    public function update(Request $request, $id)
    {
        $apartmentData = $this->apartmentService->update($request->all(), $id);

        return response()->json($apartmentData['apartments'], $apartmentData['statusCode']);
    }

//    public function destroy($id)
//    {
//        $apartmentData = $this->apartmentService->destroy($id);
//        return response()->json($apartmentData['message'], $apartmentData['statusCode']);
//    }



    function destroy($id)
    {
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
