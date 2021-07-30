<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LoginController;
use App\Models\Apartment;
use Illuminate\Http\Request;
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


//Route::post('login', [LoginController::class, 'login']);

//Route::post('/change-password', [AuthController::class, 'changePassword']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/google', [\App\Http\Controllers\Api\GoogleController::class, 'redirectToGoogle']);
    Route::get('/google/callback', [\App\Http\Controllers\Api\GoogleController::class, 'handleGoogleCallback']);
});

Route::middleware('auth:api')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/apartment/show/{id}', [ApartmentController::class, 'show']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
});
Route::group([
    'middleware' => 'api',
    'prefix'=>'apartment'
],function ($router){
    Route::get('/',[Apartment::class, 'index']);
    Route::post('/add',[Apartment::class, 'add']);
    Route::put('/{$id}',[Apartment::class,'update']);
    Route::delete('/{$id}',[Apartment::class, 'destroy']);
});
