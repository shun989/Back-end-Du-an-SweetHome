<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
// use Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json([
                'message' => 'Email hoặc mật khẩu không chính xác.',
                'error' => 'Unauthorized'
            ]);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6|max:8',
            'phone' => 'required|regex:/^(0+[0-9]{9})$/|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
            return response()->json([$validator->errors()->toJson(),
                'message' => 'Email đã tồn tại!',
                'error' => 'email'
            ], 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            [
                'password' => bcrypt($request->password),
            ]
        ));

        return response()->json([
            'message' => 'Bạn đã đăng ký thành công!',
            'user' => $user
        ], 201);

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Bạn đã đăng xuất.!'], 200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

// login Google

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
//                Session::put('email_user', $finduser['email']);

                return response()->json(['status' => 'success']);

            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456')
                ]);
                Auth::login($newUser);
                return response()->json(['status' => 'success']);
//                return redirect()->route('product.index');
            }

        } catch (Exception $e) {
            dd($e->getMessage(), 1);
        }
    }

//    public function redirectToGoogle()
//    {
//        return Socialite::driver('google')->redirect();
//    }
//
//    public function handleGoogleCallback()
//    {
//        try {
//
//            $user = Socialite::driver('google')->stateless()->user();
//            $finduser = User::where('google_id', $user->id)->first();
//
//            if ($finduser) {
//
//                Auth::login($finduser);
////                Session::put('email_user', $finduser['email']);
//
//                return response()->json(['status' => 'success']);
//
//            } else {
//
//                $newUser = User::create([
//                    'name' => $user->name,
//                    'email' => $user->email,
//                    'google_id' => $user->id,
//                    'password' => encrypt('123456')
//                ]);
//                Auth::login($newUser);
//                return response()->json(['status' => 'success']);
////                return redirect()->route('product.index');
//            }
//
//        } catch (Exception $e) {
//            dd($e->getMessage(), 1);
//        }
//    }

    public function changePassword(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:6|max:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validators->fails()) {
            return response()->json([$validators->errors()->toJson(),
                'message' => 'Password not match',
                'error' => 'password_confirmation'
            ], 400);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password,$user->password)) {
            return response()->json(['error' => "It's not your current password"]);
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message'=>'Change password success!']);

    }
}
