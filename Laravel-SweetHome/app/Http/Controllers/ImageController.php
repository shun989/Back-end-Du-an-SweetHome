<?php

namespace App\Http\Controllers;

use App\Http\Services\ImageService;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{

    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $images = DB::table('images')
            ->JOIN ('apartments', 'apartments.id', '=', 'images.apartment_id')
            ->get();
        return response()->json($images, 200);
    }

    public function create(Request $request)
    {
        $file = $request->file('name');
        $fileName = date('His') . '-' . $file->getClientOriginalName();
        $data = $request->all();
        $data['name'] = $fileName;

        if ($request->hasFile('name')) {
            $extension = $file->getClientOriginalExtension();
            $picture = $fileName;
            $file->move(public_path('image'), $picture);
            $dataImage = $this->imageService->create($data);
            return response()->json(['dataImage' => $dataImage, 'message' => 'Add New Image Successfully']);
        }else{
            return response()->json(['message'=> 'Select file first']);
        }
    }

//    public function create( Request $request)
//    {
//        $request->validate([
//            'name' => 'required'
//        ]);
//
//        if ($request->hasfile('name')) {
//            $images = $request->file('name');
//            $id = $request->id;
//            foreach($images as $image) {
//                $name = rand(1, 100) . date('Y-m-d_h:i:s') . '.' . $image->extension();
//                $image->storeAs(public_path("image"), $name);
//                Image::create([
//                    'apartment_id' => $id,
//                    'image' => $name,
//                ]);
//            }
//            return response()->json(['dataImage' => $image, 'message' => 'Add New Image Successfully']);
//        }else{
//            return response()->json(['message'=> 'Select file first']);
//        }
//    }

    public function update(Request $request, $id)
    {
        $imageData = $this->imageService->update($request->all(), $id);

        return response()->json($imageData['images'], $imageData['statusCode']);
    }

    function destroy($id)
    {
        $user = Image::find($id);

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
