<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $books = Book::with('publisher')->get();
        // $publisher = Publisher::with('books')->get();
        // $catalog = Catalog::with('books')->get();
        // $author = Author::with('books')->get();

        // return $author;
        //no1
        $data = User::select('*')
                    ->whereNotIn('users.member_id', ['SELECT id FROM members'])
                    ->get();

        //no2
        $data2 = User::select('*')
                    ->whereIn('users.member_id', ['SELECT id FROM members'])
                    ->get();

        //no3
        $data3 = Member::select('members.id', 'members.name',)
                    ->whereNotIn('members.id', ['SELECT member_id FROM transactions'])
                    ->get();

        //no4
        $data4 = Transaction::select('transactions.member_id', 'members.name', 'members.phone_number')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->get();

        //no5
        // $data5 = DB::select('SELECT * from members');
        $data5 = Transaction::select('transactions.member_id', 'members.name', 'members.phone_number')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->groupBy('transactions.member_id')
                            ->having(DB::raw('count(transactions.member_id)'), '>', 1)
                            ->get();

        //no6
        $data6 = Transaction::select('members.name', 'members.phone_number', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->get();

        //no7
        $data7 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->whereMonth('transactions.date_end','=',6)
                            ->get();

        //no8
        $data8 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->whereMonth('transactions.date_start','=',5)
                            ->get();

        //no9
        $data9 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->whereMonth('transactions.date_start','=',11)
                            ->whereMonth('transactions.date_end','=',11)
                            ->get();

        //no10
        $data10 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->where('members.address','like','%North%')
                            ->get();

        //no11
        $data11 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->where('members.address','like','%North%')
                            ->where('members.gender', 'like', 'M')
                            ->get();

        //no12
        $data12 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end',
                                        'transaction_details.book_id', 'books.isbn')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                            ->join('books', 'books.id', '=', 'transaction_details.book_id')
                            ->get();

        //no13
        $data13 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end',
                                    'transaction_details.book_id', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', DB::raw('(transaction_details.qty * books.price) AS total_price'))
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                            ->join('books', 'books.id', '=', 'transaction_details.book_id')
                            ->get();

        $data14 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end',
                                    'transaction_details.book_id', 'books.isbn', 'transaction_details.qty', 'books.title', 'publishers.name AS publisher', 'authors.name AS author', 'catalogs.name AS catalog')
                            ->join('members', 'members.id', '=', 'transactions.member_id')
                            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                            ->join('books', 'books.id', '=', 'transaction_details.book_id')
                            ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                            ->join('authors', 'authors.id', '=', 'books.author_id')
                            ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                            ->get();

        //no15
        $data15 = Catalog::select('catalogs.*', 'books.title')
                        ->join('books', 'books.catalog_id', '=', 'catalogs.id')
                        ->get();

        //no16
        $data16 = Book::select('books.*', 'publishers.name as publisher')
                        ->leftJoin('publishers', 'publishers.id', '=', 'books.publisher_id')
                        ->get();

        //no17
        $data17 = Book::select(DB::raw('count(*) AS Catalog_Kiera'))
                        ->where('catalog_id', '=', 2)
                        ->get();

        //no18
        $data18 = Book::select('*')
                        ->where('price','>', 15000)
                        ->orderBy('price', 'desc')
                        ->get();

        //no19
        $data19 = Book::select('*')
                        ->where('catalog_id', '=', 2)
                        ->where('qty', '>', 10)
                        ->get();

        //no20
        $data20 = Member::select('*')
                        ->whereMonth('created_at','=',11)
                        ->get();


        // return $data5;


        return view('home');
    }
}
