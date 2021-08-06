<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        return response()->json($category, 200);
    }

    function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        $statusCode = 201;
        if (!$category)
            $statusCode = 404;
        return response($category, $statusCode);
    }
    function show($id){
        $category = Category::findOrFail($id);
        $statusCode = 200;
        if (!$category)
            $statusCode = 404;
        return response()->json($category, $statusCode);
    }
}
