<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Book;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $members = Member::with('user')->get();
        // $catalogs = Catalog::with('books')->get();
        // $publishers = Publisher::with('books')->get();
         $authors = Author::with('books')->get();
        // $books = Book::with( 'transaction_details')->get();
        // $members = Member::with('transactions')->get();

        //return $members;
        //return $books;
        return $authors;
        //return $publishers;
        //return $catalogs;
    }
}