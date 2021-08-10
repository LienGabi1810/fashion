<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\backend\AdminController;

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

// ====== Frontend ===== 

//index
Route::get('/',[IndexController::class, 'getIndex']);

//contact
Route::get('/contact',[IndexController::class, 'getContact']);

//About
Route::get('/about',[IndexController::class, 'getAbout']);

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('', [ProductController::class, 'getProduct']);
    Route::get('detail',[ProductController::class, 'getProductDetail']);
});

//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('',  [CartController::class, 'getCart']);

});

//blog
Route::group(['prefix' => 'blog'], function () {
    Route::get('',  [BlogController::class, 'getBlog']); 
    Route::get('/detail',  [BlogController::class, 'getBlogDetail']); 

});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckoutController@getCheckout');
    Route::get('complete','frontend\CheckoutController@getComplete');
    Route::post('','frontend\CheckoutController@postCheckout');
});


//====BACKEND====

Route::get('/admin',[AdminController::class, 'getIndex']);


//blog
Route::group(['prefix' => 'blog'], function () {
    Route::get('',  [BlogController::class, 'getBlog']); 
    Route::get('/detail',  [BlogController::class, 'getBlogDetail']); 

});