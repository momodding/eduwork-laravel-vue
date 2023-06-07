<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
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

Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);

//Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::resource('/authors', AuthorController::class);

//Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::resource('/books', BookController::class);

// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);
Route::resource('/catalogs', CatalogController::class);
Route::resource('/members', MemberController::class);
Route::resource('/publishers', PublisherController::class);

Route::resource('/transactions', TransactionController::class);
Route::get('/transaction_details/{id}', [App\Http\Controllers\TransactionController::class, 'detail']);
Route::get('/transaction_edit/{id}', [App\Http\Controllers\TransactionController::class, 'edit']);

Route::get('api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::get('api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

Route::get('filterStatus/{status}',[App\Http\Controllers\TransactionController::class, 'filterStatus']);
Route::get('filterDate',[App\Http\Controllers\TransactionController::class, 'filterDate']);
