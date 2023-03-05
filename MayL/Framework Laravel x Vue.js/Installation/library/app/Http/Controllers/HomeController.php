<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
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
        //$members = Member::with('user')->get();

        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('publishers')->get();

        //$books = book::with('publisher')->get();
        //$catalogs = Catalog::with('catalogs')->get();
        
        //$books = book::with('author')->get();
        $authors = Author::with('authors')->get();

        //return $books;
        //return $publisher;
        //return $catalogs;
        return $authors;

        return view('home');

    }
}
