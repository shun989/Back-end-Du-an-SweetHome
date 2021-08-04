<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function update(Request $request, $id)
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

    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
}
