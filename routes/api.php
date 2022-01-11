<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;



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

Route::post('/login',[AuthController::class,'login'])->name('api-login');
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/create', [ProductController::class, 'create']);
        Route::post('/update', [ProductController::class, 'update']);
        Route::post('/destroy', [ProductController::class, 'destroy']);  
    });
    Route::group(['prefix' => 'stock'], function () {
        Route::post('/', [ProductController::class, 'updateStock']);
    });

    // Route::apiResource('products',ProductController::class)
});

    
