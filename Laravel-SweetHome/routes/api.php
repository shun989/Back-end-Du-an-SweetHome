<?php


use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
//    Route::get('/google', [GoogleController::class, 'redirectToGoogle']);
//    Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::middleware('auth:api')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::prefix('apartment')->group(function (){
        Route::post('/add',[ApartmentController::class, 'store']);
        Route::put('/{$id}',[ApartmentController::class,'update']);
        Route::delete('/{$id}',[ApartmentController::class, 'destroy']);
    });

});
Route::prefix('apartment')->group(function (){
    Route::get('', [ApartmentController::class, 'index']);
    Route::get('/{id}', [ApartmentController::class, 'show']);

});

