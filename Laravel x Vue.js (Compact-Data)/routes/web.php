<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/homes/home', [App\Http\Controllers\HomeController::class, 'create']);
Route::get('/homes/{home}/edit', [App\Http\Controllers\HomeController::class, 'edit']);
Route::put('/homes/{home}', [App\Http\Controllers\HomeController::class, 'update']);
Route::delete('/homes/{home}', [App\Http\Controllers\HomeController::class, 'destroy']);
Route::post('/homes', [App\Http\Controllers\HomeController::class, 'store']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);

Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);
Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create']);
Route::get('/authors/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy']);
Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store']);

Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create']);
Route::get('/books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit']);
Route::put('/books/{book}', [App\Http\Controllers\BookController::class, 'update']);
Route::delete('/books/{book}', [App\Http\Controllers\BookController::class, 'destroy']);
Route::post('/books', [App\Http\Controllers\BookController::class, 'store']);

Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/members/create', [App\Http\Controllers\MemberController::class, 'create']);
Route::get('/members/{member}/edit', [App\Http\Controllers\MemberController::class, 'edit']);
Route::put('/members/{member}', [App\Http\Controllers\MemberController::class, 'update']);
Route::delete('/members/{member}', [App\Http\Controllers\MemberController::class, 'destroy']);
Route::post('/members', [App\Http\Controllers\MemberController::class, 'store']);

Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transactions/create', [App\Http\Controllers\TransactionController::class, 'create']);
Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit']);
Route::put('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'update']);
Route::delete('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'destroy']);
Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'store']);

Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index']);
Route::get('/transaction_details/create', [App\Http\Controllers\TransactionDetailController::class, 'create']);
Route::get('/transaction_details/{transaction_detail}/edit', [App\Http\Controllers\TransactionDetailController::class, 'edit']);
Route::put('/transaction_details/{transaction_detail}', [App\Http\Controllers\TransactionDetailController::class, 'update']);
Route::delete('/transaction_details/{transaction_detail}', [App\Http\Controllers\TransactionDetailController::class, 'destroy']);
Route::post('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'store']);