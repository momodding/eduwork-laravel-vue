<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/authors', [App\Http\Controllers\authorController::class, 'index']);
Route::get('/books', [App\Http\Controllers\bookController::class, 'index']);
Route::get('/members', [App\Http\Controllers\memberController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\transactionController::class, 'index']);
