<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\MerchantController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\OrderController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//route x method
//Route::get('/user', [UserController::class,'teste']);

//Route::get('/get_user', 'App\Http\Controllers\ApiController@get_user')->name('get_user');
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::group(['middleware' => ['apiJwt']], function() {


        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class,'index']);
            Route::get('/show/{id}', [UserController::class,'show']);
            Route::post('/create', [UserController::class,'store']);
            Route::put('/edit', [UserController::class,'update']);
            Route::delete('/delete', [UserController::class,'destroy']);
        });

        Route::prefix('merchant')->group(function () {
            Route::get('/', [MerchantController::class,'index']);
            Route::get('/show/{id}', [MerchantController::class,'show']);
            Route::post('/create', [MerchantController::class,'store']);
            Route::put('/edit', [MerchantController::class,'update']);
            Route::delete('/delete', [MerchantController::class,'destroy']);
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class,'index']);
            Route::get('/show/{id}', [ProductController::class,'show']);
            Route::post('/create', [ProductController::class,'store']);
            Route::put('/edit', [ProductController::class,'update']);
            Route::delete('/delete', [ProductController::class,'destroy']);
        });

        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class,'index']);
            Route::get('/show/{id}', [OrderController::class,'show']);
            Route::post('/create', [OrderController::class,'store']);
            Route::put('/edit', [OrderController::class,'update']);
            Route::delete('/delete', [OrderController::class,'destroy']);
        });



});

