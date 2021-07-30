<?php
//
//namespace App\Http\Controllers\Api;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\Models\User;
//use Exception;
//
////use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Session;
//use Laravel\Socialite\Facades\Socialite;
//
//class GoogleController extends Controller
//{
//    public function redirectToGoogle()
//    {
//        return Socialite::driver('google')
//            ->with(['code_challenge_method' => 'SXyX7LgsDa'])
//            ->redirect();
////        dd(Socialite::driver('google')
////            ->with(['code_challenge_method' => 'SXyX7LgsDa'])
////            ->redirect());
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
////                dd(1);
//
//                Auth::login($finduser);
////                Session::put('email_user', $finduser['email']);
//
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
//}
