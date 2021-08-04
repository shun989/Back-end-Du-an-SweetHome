<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('images');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('images')){
            $images = $request->file('images');

            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $path = $image->storeAs('uploads',$name,'public');

                Image::create([
                    'name' => $name,
                    'path' => '/storage/' . $path
                ]);
            }
        }
        return response()->json('success', 'Images uploaded successfully');
    }
}
