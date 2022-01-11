<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('products/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::resource('products',ProductController::class);
    
    Route::group(['namespace' => 'Friend','prefix' => 'friends'], function () {
    });

});