<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirectin',[HomeController::class,'redirectin'])->name('redirectin');
Route::controller(CategoryController::class)->group(function(){
    Route::get('allcategory','allcategory')->name('allcategory');
    Route::get('showcategory/{id}','showcategory')->name('showcategory');
    Route::get('addcategory','addcategory')->name('addcategory');
    Route::POST('storecategoty','storecategory')->name('storecategory');
    Route::delete('deletecategory/{id}','deletecategory')->name('deletecategory');
});

    Route::controller(ProductController::class)->group(function(){
        // Route::prefix('admin')->group(function(){

            Route::middleware(IsAdmin::class)->group(function(){
                Route::get('products/show/{id}','show')->name ('showProducts');

                Route::get('products','allProducts')->name('all_Prouducts');

                //create
                Route::get('products/create','create')->name('create_Prodcts');
                Route::post('products/','store')->name('store');

                //edit
                Route::get('products/edit/{id}','edit')->name('edit_product');
                Route::put('products/{id}','update')->name('update');

                //delete
                Route::delete('products/{id}','delete')->name('delete_product ');
            });
        // });
    });

//user route
Route::controller(UserController::class)->group(function(){
    Route::get('','all')->name('allUser');
    Route::get('products/{id}','show');
});