<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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

Route::get('web/logout',[Controller::class,'logout'])->name('web.logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $result = [];
    if(Auth::user()->role == 'admin'){
        $result = Product::count();
    }else{
        $result = Product::where('created_by',Auth::user()->id)->count();
    }
    return view('dashboard',compact('result'));     
})->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('products/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::resource('products',ProductController::class);
    
    Route::group(['namespace' => 'Friend','prefix' => 'friends'], function () {
    });

});