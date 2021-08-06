<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $dataUser = $this->userService->create($request->all());
        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }


    function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        $data = [
            'status' => 'success',
            'message' => 'Cập nhật thông tin thành công'
        ];

        return response()->json($data);
    }


}
