<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;


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
        // $catalogs = Catalog::with('books')->get();

        // return $catalogs;

        //no 1
        $data = Member::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();

        //no 2
        $data2 = Member::select('*')
            ->leftjoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', '=', NULL)
            ->get();

        //no3
        $data3 = Transaction::select('members.id', 'members.name')
            ->rightjoin('members', 'members.id', '=', 'transactions.member_id')
            ->where('transactions.member_id', NULL)
            ->get();

        //no 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('members.id', 'asc')
            ->get();

        //no 5
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->whereIn('members.id', function ($query) {
                $query->select('member_id')
                    ->from('transactions')
                    ->groupBy(DB::raw('1'))
                    ->having(DB::raw('count(member_id)'), '>', 1);
            })->get();


        //no 6
        $data6 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('transactions.id', 'asc')
            ->get();

        // no 7
        $data7 =  Member::select('members.id', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            // ->whereBetween('transactions.date_start', [01, 31])
            ->whereMonth('transactions.date_end', '05')
            ->get();

        // no 8
        $data8 =  Member::select('members.id', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereMonth('transactions.date_start', '06')
            ->get();

        //no 9
        $data9 = Member::select('members.id', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereMonth('transactions.date_start', '06')
            ->whereMonth('transactions.date_end', '05')
            ->get();

        // no 10
        $data10 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.address', 'LIKE', '%bandung%')
            ->get();

        //no 11
        $data11 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'members.gender', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.address', 'LIKE', '%bandung%')
            ->where('members.gender', 'LIKE', 'f')
            ->get();

        //no 12
        $data12 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->where('books.isbn', '>', 1)
            ->get();

        //no 13
        $data13 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.price', DB::raw('SUM(books.qty * books.price) as total'))
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->get();

        //no14
        $data14 = Member::select('members.id', 'members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
            ->get();

        //no15
        $data15 = Book::select('title', 'catalogs.name')
            ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
            ->get();

        //no 16
        $data16 = Book::select('author_id', 'authors.name')
            ->leftjoin('authors', 'books.author_id', 'authors.id')
            ->get();

        //no17
        $data17 = Book::select(DB::raw('COUNT(*) as jumlah_pengarang'))
            ->where('author_id', '4')
            ->get();
        //no18
        $data18 = Book::select('*')
            ->where('price', '>', 10000)
            ->get();

        //no 20
        $data20 = Member::select('*')
            ->whereMonth('members.created_at', '6')
            ->get();



        return $data12;
        return view('home');
    }
}
