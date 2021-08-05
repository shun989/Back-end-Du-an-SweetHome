<?php

namespace App\Http\Controllers;


use App\Http\Services\AvatarService;
use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    protected AvatarService $avatarService;

    public function __construct(AvatarService $avatarService)
    {
        $this->avatarService = $avatarService;
    }

    public function index()
    {
        $avatars = Avatar::all();
        return response()->json($avatars, 200);
    }

    public function store(Request $request)
    {
        $file = $request->file('avatar-name');
        $fileName = date('His') . '-' . $file->getClientOriginalName();
        $data = $request->all();
        $data['avatar-name'] = $fileName;

        if ($request->hasFile('avatar-name')) {
            $extension = $file->getClientOriginalExtension();
            $avatar = $fileName;
            $file->move(public_path('avatar'), $avatar);
            $dataAvatar = $this->avatarService->create($data);
            return response()->json(['dataAvatar' => $dataAvatar, 'message' => 'Add New Avatar Successfully']);
        }else{
            return response()->json(['message'=> 'Select file first']);
        }
    }
}
