<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\subcategory\SubCategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[MyCommerceController::class,'index'])                                            ->name('home');
Route::get('/product-category/{id}',[MyCommerceController::class,'category'])                    ->name('product.category');
Route::get('/product-detail',[MyCommerceController::class,'detail'])                             ->name('product.detail');
Route::get('/single-product-detail/{id}',[MyCommerceController::class,'singleProductDetails'])   ->name('product.singleDetails');
Route::post('/add-to-cart/{id}',[CartController::class,'addToCart'])                             ->name('addtocart');
Route::get('/show-cart',[CartController::class,'showCart'])                                      ->name('show-cart');
Route::get('/checkout',[CheckoutController::class,'index'])                                      ->name('checkout');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //category module start here
    Route::get('/category/add',             [CategoryController::class,'index'])    ->name('category.add');
    //category crud start here
    Route::post('/category/create',         [CategoryController::class,'store'])    ->name('category.create');
    Route::get('/category/edit/{id}',       [CategoryController::class,'edit'])     ->name('category.edit');
    Route::post('/category/update/{id}',    [CategoryController::class,'update'])   ->name('category.update');
    Route::get('category/delete/{id}',      [CategoryController::class,'delete'])   ->name('category.delete');
    //category crud end here

    //all category showing
    Route::get('/category/manage',         [CategoryController::class,'manage'])    ->name('category.manage');
    //category module end here

    //sub category start here
    Route::get('/subcategory/add',          [SubCategoryController::class, 'index'])    ->name('subcategory.add');
    Route::post('/subcategory/create',      [SubCategoryController::class, 'create'])   ->name('subcategory.create');
    Route::get('/subcategory/manage',       [SubCategoryController::class, 'manage'])   ->name('subcategory.manage');
    Route::get('/subcategory/edit/{id}',    [SubCategoryController::class, 'edit'])     ->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])   ->name('subcategory.update');
    Route::get('/subcategory/delete/{id}',  [SubCategoryController::class, 'delete'])   ->name('subcategory.delete');
    //sub category end here

    //brand module start here
    Route::get('/brand/add',            [BrandController::class,'index'])   ->name('brand.add');
    Route::post('/brand/create',        [BrandController::class,'create'])  ->name('brand.create');
    Route::get('/brand/manage',         [BrandController::class,'manage'])  ->name('brand.manage');
    Route::get('/brand/edit/{id}',      [BrandController::class,'edit'])    ->name('brand.edit');
    Route::post('/brand/update/{id}',   [BrandController::class,'update'])  ->name('brand.update');
    Route::get('/brand/delete/{id}',    [BrandController::class,'delete'])  ->name('brand.delete');
    //brand module end here

    //brand module start here
    Route::get('/unit/add',            [UnitController::class,'index'])   ->name('unit.add');
    Route::post('/unit/create',        [UnitController::class,'create'])  ->name('unit.create');
    Route::get('/unit/manage',         [UnitController::class,'manage'])  ->name('unit.manage');
    Route::get('/unit/edit/{id}',      [UnitController::class,'edit'])    ->name('unit.edit');
    Route::post('/unit/update/{id}',   [UnitController::class,'update'])  ->name('unit.update');
    Route::get('/unit/delete/{id}',    [UnitController::class,'delete'])  ->name('unit.delete');
    //brand module end here


     //product module start here
     Route::get('/product/add',                     [ProductController::class,'index'])   ->name('product.add');
     Route::post('/product/create',                 [ProductController::class,'create'])  ->name('product.create');
     Route::get('/product/manage',                  [ProductController::class,'manage'])  ->name('product.manage');
     Route::get('/product/edit/{id}',               [ProductController::class,'edit'])    ->name('product.edit');
     Route::post('/product/update/{id}',            [ProductController::class,'update'])  ->name('product.update');
     Route::get('/product/delete/{id}',             [ProductController::class,'delete'])  ->name('product.delete');
     Route::get('/product/details/{id}',            [ProductController::class,'details']) ->name('product.details');

     Route::get('/product/category/select/{id}',    [ProductController::class,'getSubCategoryByCategory'])  ->name('product.select');
     //product module end here


});
