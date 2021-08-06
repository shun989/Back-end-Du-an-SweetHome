<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Resources\ApartmentResource;
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
        return ApartmentResource::collection(Apartment::with('user', 'status', 'category', 'ward')
            ->get());
    }

    function listOfUser($id_user)
    {
        return ApartmentResource::collection(Apartment::with('user', 'status', 'category', 'ward')
            ->where('user_id', '=', $id_user)
            ->get());

    }

    public function show($id)
    {
        $apartments = Apartment::with('user', 'status', 'category', 'ward')
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
            'image' => $apartments->user->image,
            'photo' => $apartments->photo,
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
        } else {
            return response()->json(['message' => 'Select file first']);
        }
    }

    public function update(Request $request, $id)
    {
        $apartmentData = $this->apartmentService->update($request->all(), $id);

        return response()->json($apartmentData['apartments'], $apartmentData['statusCode']);
    }



    public function destroy($id)
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

    public function getApartmentOfUser()
    {
        return ApartmentResource::collection(Apartment::with('user', 'status', 'category', 'ward')
            ->where('user_id', '=', 54)
            ->get());

//        $apartment = DB::table('apartments')
//            ->JOIN ('users', 'users.id', '=', 'apartments.user_id')
//            ->SELECT ('apartments.*')
//            ->get();
//        return response()->json($apartment, 200);
    }
}
