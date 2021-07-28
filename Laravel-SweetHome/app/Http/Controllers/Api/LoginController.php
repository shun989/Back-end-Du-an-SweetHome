<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $data = $request->only(['email', 'password']);
        if (!Auth::attempt($data)) {
            return response()->json(['status' => 'error']);
        }
        return response()->json(['status' => 'success']);
    }
}
