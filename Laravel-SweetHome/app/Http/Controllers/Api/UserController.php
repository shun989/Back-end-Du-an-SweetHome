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
        return response()->json($dataUser['users'],$dataUser['statusCode']);
    }
}
