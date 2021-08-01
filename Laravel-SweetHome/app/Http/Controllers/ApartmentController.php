<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Services\Impl\ApartmentServiceImpl;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
//    protected $apartment;
//
//    public function __construct(ApartmentServiceImpl $apartmentServiceImpl)
//    {
//        $this->apartment = $apartmentServiceImpl;
//    }

    function index()
    {
        $apartments = Apartment::with('user', 'status', 'category')->get();
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
        $apartment = Apartment::findOrFail($id);
        $statusCode = 200;
        if (!$apartment)
            $statusCode = 404;
        return response()->json($apartment, $statusCode);
    }

    function update(UpdateApartmentRequest $request, $id)
    {

        $categories = Apartment::findOrFail($id);
        $categories->fill($request->all());
        $categories->save();
        $statusCode = 200;
        if (!$categories)
            $statusCode = 404;
        return response()->json($categories, $statusCode);
    }

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

//    public function create(Request $request)
//    {
//        $file = $request->file('image');
//        $fileName = date('His') . '-' . $file->getClientOriginalName();
//        $data = $request->all();
//        $data['image'] = $fileName;
//
//        if ($request->hasFile('image')) {
//            $extension = $file->getClientOriginalExtension();
//            $picture = $fileName;
//            $file->move(public_path('image'), $picture);
//            $dataApartment = $this->apamentService->create($data);
//            return response()->json(['dataApartment' => $dataApartment, 'message' => 'Successfully']);
//        }else{
//            return response()->json(['message'=> 'Select file first']);
//        }
//    }

}
