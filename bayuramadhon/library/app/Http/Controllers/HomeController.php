<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;


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
        // $books = Book::with('publishers')->get();
        // $publishers = Publisher::all();
        // $publishers = Publisher::with('books')->get();
        // $authors = Author::all();
        // $authors = Author::with('books')->get();
        // $catalogs = Catalog::all();
        $catalogs = Catalog::with('books')->get();

        return $catalogs;
        return view('home');
    }
}
