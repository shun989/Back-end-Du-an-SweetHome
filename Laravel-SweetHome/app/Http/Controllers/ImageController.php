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

//    public function store(Request $request)
//    {
//        if ($request->hasFile('images')){
//            $images = $request->file('images');
//
//            foreach ($images as $image) {
//                $name = $image->getClientOriginalName();
//                $path = $image->storeAs('uploads',$name,'public');
//
//                Image::create([
//                    'name' => $name,
//                    'path' => '/storage/' . $path
//                ]);
//                return response()->json([$image ,'success', 'Images uploaded successfully']);
//            }
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
