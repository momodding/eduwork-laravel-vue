<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        $books = Book::all();
        $catalogs = Catalog::all();
        $publishers = Publisher::all();

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        return view('admin.book', compact('authors','books','catalogs','publishers','overdueUsers'));
    }

    public function api()
    {
        $books = Book::all();

        return json_encode($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'isbn' =>['required'],
            'title' =>['required'],
            'year' =>['required'],
            'publisher_id' =>['required'],
            'author_id' =>['required'],
            'catalog_id' =>['required'],
            'qty' =>['required'],
            'price' =>['required']
        ]);

        Book::create($request->all());

        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'isbn' =>['required'],
            'title' =>['required'],
            'year' =>['required'],
            'publisher_id' =>['required'],
            'author_id' =>['required'],
            'catalog_id' =>['required'],
            'qty' =>['required'],
            'price' =>['required']
        ]);

        $book->update($request->all());

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
}