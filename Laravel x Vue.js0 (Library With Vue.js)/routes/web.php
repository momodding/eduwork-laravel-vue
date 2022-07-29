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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/homes/home', [App\Http\Controllers\HomeController::class, 'create'])->name('homes.home');
Route::get('/homes/{home}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('homes.edit');
Route::put('/homes/{home}', [App\Http\Controllers\HomeController::class, 'update'])->name('homes.update');
Route::delete('/homes/{home}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('homes.destroy');
Route::post('/homes', [App\Http\Controllers\HomeController::class, 'store'])->name('homes.store');
Route::resource('/homes', App\Http\Controllers\HomeController::class);

// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index'])->name('dashboard');
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create'])->name('catalogs.home');
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit'])->name('catalogs.edit');
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update'])->name('catalogs.update');
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy'])->name('catalogs.destroy');
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store'])->name('catalogs.store');
// Route::resource('/catalogs', "App\Http\Controllers\CatalogController");
Route::resource('/catalogs', App\Http\Controllers\CatalogController::class);

// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index'])->name('dashboard');
// Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create'])->name('publishers.home');
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit'])->name('publishers.edit');
// Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update'])->name('publishers.update');
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy'])->name('publishers.destroy');
// Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store'])->name('publishers.store');
// Route::resource('/publishers', "App\Http\Controllers\PublisherController");
Route::resource('/publishers', App\Http\Controllers\PublisherController::class);

// Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('dashboard');
// Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create'])->name('authors.home');
// Route::get('/authors/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit'])->name('authors.edit');
// Route::put('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'update'])->name('authors.update');
// Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('authors.destroy');
// Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store'])->name('authors.store');;
// Route::resource('/authors', "App\Http\Controllers\AuthorController");
Route::resource('/authors', App\Http\Controllers\AuthorController::class);

// Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('dashboard');
// Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.home');
// Route::get('/books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
// Route::put('/books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
// Route::delete('/books/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
// Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::resource('/books', App\Http\Controllers\BookController::class);

// Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('dashboard');
// Route::get('/members/create', [App\Http\Controllers\MemberController::class, 'create'])->name('members.home');
// Route::get('/members/{member}/edit', [App\Http\Controllers\MemberController::class, 'edit'])->name('members.edit');
// Route::put('/members/{member}', [App\Http\Controllers\MemberController::class, 'update'])->name('members.update');
// Route::delete('/members/{member}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('members.destroy');
// Route::post('/members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');
Route::resource('/members', App\Http\Controllers\MemberController::class);

// Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('dashboard');
// Route::get('/transactions/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('transactions.home');
// Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit'])->name('transactions.edit');
// Route::put('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'update'])->name('transactions.update');
// Route::delete('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'destroy'])->name('transactions.destroy');
// Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'store'])->name('transactions.store');
Route::resource('/transactions', App\Http\Controllers\TransactionController::class);

// Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index'])->name('dashboard');
// Route::get('/transaction_details/create', [App\Http\Controllers\TransactionDetailController::class, 'create'])->name('transaction_details.home');
// Route::get('/transaction_details/{transaction_detail}/edit', [App\Http\Controllers\TransactionDetailController::class, 'edit'])->name('transaction_details.edit');
// Route::put('/transaction_details/{transaction_detail}', [App\Http\Controllers\TransactionDetailController::class, 'update'])->name('transaction_details.update');
// Route::delete('/transaction_details/{transaction_detail}', [App\Http\Controllers\TransactionDetailController::class, 'destroy'])->name('transaction_details.destroy');
// Route::post('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'store'])->name('transaction_details.store');
Route::resource('/transaction_details', App\Http\Controllers\TransactionDetailController::class);

