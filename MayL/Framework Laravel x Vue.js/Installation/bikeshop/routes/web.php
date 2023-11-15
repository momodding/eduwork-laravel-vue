<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
Route::get('/spatie', [App\Http\Controllers\TransactionController::class, 'spatie']);


Route::resource('/members',MemberController::class);
Route::resource('/categories',CategoryController::class);
Route::resource('/variants',VariantController::class);
Route::resource('/products',ProductController::class);
Route::resource('/transactions',TransactionController::class);
Route::resource('/carts',CartController::class);

Route::get('api/members',[App\Http\Controllers\MemberController::class, 'api']);
Route::get('api/products',[App\Http\Controllers\ProductController::class, 'api']);
Route::get('api/transactions',[App\Http\Controllers\TransactionController::class, 'api']);
Route::get('api/carts',[App\Http\Controllers\CartController::class, 'api']);
Route::get('api/cart/{id}',[App\Http\Controllers\TransactionController::class, 'cart']);

Route::post('checkout',[App\Http\Controllers\TransactionController::class, 'check']);
Route::get('transaction_details/{id}',[App\Http\Controllers\TransactionController::class, 'detail']);
Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'cart']);
Route::post('/cart/min/{id}', [App\Http\Controllers\CartController::class, 'min']);
Route::post('/cart/plus/{id}', [App\Http\Controllers\CartController::class, 'plus']);
