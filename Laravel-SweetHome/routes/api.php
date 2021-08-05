<?php


use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WardController;
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

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-password/', [AuthController::class, 'changePassword'])
        ->name('change.password');

    Route::prefix('me')->group(function () {
        Route::put('/{id}/update-profile', [UserController::class, 'update'])
            ->name('profile.update');
    });
    Route::prefix('category')->group(function () {
        Route::post('/add-category', [CategoryController::class, 'store']);
    });

    Route::prefix('booking')->group(function () {
        Route::get('/{id}', [BookingController::class, 'getBookmarked']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
        Route::post('/create', [BookingController::class, 'store']);
    });

    Route::prefix('apartment')->group(function () {
        Route::post('/add', [ApartmentController::class, 'store']);
        Route::prefix('me')->group(function () {
            Route::put('/{id}/update-profile', [UserController::class, 'update'])->name('profile.update');
        });
        Route::prefix('category')->group(function () {
            Route::post('/add-category', [CategoryController::class, 'store']);
        });

        Route::prefix('apartment')->group(function () {
            Route::post('/add', [ApartmentController::class, 'create']);
            Route::put('/{id}', [ApartmentController::class, 'update']);
            Route::delete('/{id}', [ApartmentController::class, 'destroy']);
        });

        Route::prefix('me')->group(function () {
            Route::put('/{id}/update-profile', [UserController::class, 'update'])->name('profile.update');
        });
        Route::prefix('category')->group(function () {
            Route::post('/add-category', [CategoryController::class, 'store']);
        });

//    Route::prefix('apartment')->group(function (){
//        Route::post('/add',[ApartmentController::class, 'store']);
//        Route::put('/{$id}',[ApartmentController::class,'update']);
//        Route::delete('/{$id}',[ApartmentController::class, 'destroy']);
//    });

    });

    Route::prefix('apartment')->group(function () {
        Route::post('/add', [ApartmentController::class, 'create']);
        Route::put('/{id}', [ApartmentController::class, 'update']);
        Route::delete('/{id}', [ApartmentController::class, 'destroy']);
        Route::get('/user', [ApartmentController::class, 'getApartmentOfUser']);
    });

    Route::prefix('apartment')->group(function () {
        Route::get('', [ApartmentController::class, 'index']);
        Route::get('/{id}', [ApartmentController::class, 'show']);
    });
    Route::prefix('image')->group(function(){
        Route::post('/upload',[ImageController::class,'create']);
    });

});

Route::prefix('home')->group(function () {
    Route::get('/featured', [HomeController::class, 'getFeaturedApartment']);
    Route::get('/lasted', [HomeController::class, 'getLastedApartment']);
    Route::get('/area/{code}', [HomeController::class, 'getAreaApartment']);
    Route::get('/count', [HomeController::class, 'countHomeArea']);
});

Route::prefix('apartment')->group(function () {
    Route::get('', [ApartmentController::class, 'index']);
    Route::get('/{id}', [ApartmentController::class, 'show']);
    Route::get('/{id}/list-of-user', [ApartmentController::class, 'listOfUser']);
    Route::put('/{id}', [ApartmentController::class, 'update']);
    Route::delete('/{id}', [ApartmentController::class, 'destroy']);
});

Route::prefix('category')->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});

Route::prefix('province')->group(function () {
    Route::get('', [ProvinceController::class, 'index']);
    Route::get('/{id}', [ProvinceController::class, 'show']);
});

Route::prefix('district')->group(function () {
    Route::get('', [DistrictController::class, 'index']);
    Route::get('/{id}', [DistrictController::class, 'show']);
});

Route::prefix('ward')->group(function () {
    Route::get('', [WardController::class, 'index']);
    Route::get('/{id}', [WardController::class, 'index']);
});

Route::prefix('status')->group(function () {
    Route::get('', [StatusController::class, 'index']);
    Route::get('/{id}', [StatusController::class, 'show']);
});

Route::prefix('image')->group(function(){
    Route::get('',[ImageController::class,'index']);
});

