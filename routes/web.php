<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use PhpParser\Node\Expr\PostDec;

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
Route::get('/home',[ProductController::class,'index']);
Route::post('/login',[UserController::class,'login'])->name('loginForm');
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/home');
    
});
Route::post('/register',[UserController::class,'register'])->name('register');
Route::get('/registering',function(){
    $errorMessage='';
    return view('register',['errorMessage'=>$errorMessage]);
});
Route::any('/cart-list',[ProductController::class,'cartList'])->name('cartList');
Route::get('/product-details/{id}',[ProductController::class,'productDetails'])->name('productDetails');
Route::post('/add-to-cart',[ProductController::class,'addToCart'])->name('addToCart');
Route::get('/remove/{id}',[ProductController::class,'removeItemFromCart'])->name('removeItemFromCart');
Route::post('/order',[ProductController::class,'checkOut'])->name('checkOut');
Route::get('/myorders',[ProductController::class,'myOrders'])->name('myOrders');

