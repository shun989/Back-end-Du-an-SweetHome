<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request)
    {
        $dataUser = $this->userService->create($request->all());
        return response()->json($dataUser['users'],$dataUser['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataUser = $this->userService->update($request->all(),$id);
        return response()->json($dataUser['users'],['message'=>'Update profile Successfully.']);
    }

//    public function updateAvatar(Request $request, $id)
//    {
//        $file = $request->file('image');
//        $fileName = date('His') . '-' . $file->getClientOriginalName();
//        $data = $request->all();
//        $data['image'] = $fileName;
//
//        if ($request->hasFile('image')) {
//            $extension = $file->getClientOriginalExtension();
//            $picture = $fileName;
//            $file->move(public_path('avatar'), $picture);
//            $dataImage = $this->userService->update($data, $id);
//            return response()->json([$dataImage['users'], 'message' => 'Change avatar Successfully']);
//        }else{
//            return response()->json(['message'=> 'Select file first']);
//        }
//    }
//
//    public function upload(Request $request, $id)
//    {
//        if($request->hasFile('image')){
//            $filename = $request->image->getClientOriginalName();
//            $request->image->move(public_path('avatar'),$filename);
//            $this->userService->update(['image'=>$filename], $id);
//        }
//        return response()->json([ 'message' => 'Change avatar Successfully']);
//
//    }
}
