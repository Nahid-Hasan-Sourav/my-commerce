<?php

use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MyCommerceController::class,'index'])->name('home');
Route::get('/product-category',[MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-detail',[MyCommerceController::class,'detail'])->name('product-detail');
Route::get('/show-cart',[CartController::class,'index'])->name('show-cart');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //category module start here
    Route::get('/category/add', [CategoryController::class,'index'])->name('category.add');
    //category crud start here
    Route::post('/category/create',[CategoryController::class,'store'])->name('category.create');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    //category crud end here
     
    //all category showing 
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    //category module end here

    //sub category start here
    
    //sub category end here


});
