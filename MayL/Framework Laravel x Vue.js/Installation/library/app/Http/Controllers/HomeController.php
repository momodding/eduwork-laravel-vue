<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Transaction;
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
        //$members = Member::with('user')->get();

        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('publishers')->get();

        //$books = book::with('publisher')->get();
        //$catalogs = Catalog::with('catalogs')->get();

        //$books = book::with('author')->get();
        //$authors = Author::with('authors')->get();

        //return $books;
        //return $publisher;
        //return $catalogs;
        //return $authors;

        //Query builder Laravel no 1
        $data = Member::select('*')
                    ->join('users', 'users.member_id','=','members.id')
                    ->get();
        
        //No 2 
        $data2 = Member::select('*')
                    ->leftJoin('users', 'users.member_id','=','members.id')
                    ->where('users.id',NULL)
                    ->get();

        //No 3
        $data3 = Transaction::select('members.id','members.name')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->where('transactions.member_id', NULL)
                    ->get();

        //No 4
        $data4 = Member::select('members.id','members.name','members.phone_number')
                    ->rightJoin('transactions','transactions.member_id','=','members.id')
                    ->orderBy('members.id','asc')
                    ->get();

        $data5 = Transaction::select('transactions.member_id','members.name','members.phone_number', DB::raw('count(member_id)as jumlah_pinjam'))
                    ->leftJoin('members','transactions.member_id','=','members.id')
                    ->groupBy('transactions.member_id','members.name','members.phone_number')
                    ->having('jumlah_pinjam','>',1)
                    ->get();
        
        //No 6
        $data6 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->get();

        //No 7
        $data7 =  Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->whereMonth('date_end',6)
                    ->get();

        //No 8
        $data8 =  Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->whereMonth('date_end',5)
                    ->get();

        //No 9
        $data9 =  Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->whereMonth('date_start',6)
                    ->whereMonth('date_end',6)
                    ->get();

        //No 10
        $data10 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->where('address','LIKE',"%Bandung%")
                    ->get();

        //No 11
        $data11 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
                    ->rightJoin('members','members.id','=','transactions.member_id')
                    ->where('address','LIKE',"%Bandung%")
                    ->where('gender','LIKE',"%2%")
                    ->get();

        //No 12
        $data12 = Transaction::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty')
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->leftJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
                    ->leftJoin('books','transaction_details.book_id','=','books.id')
                    ->groupBy('books.isbn','members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.qty')
                    ->having('transaction_details.qty','>',1)
                    ->get();

        //No 13 semua buku
        $data13 = Transaction::select
                    ('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price', DB::raw('transaction_details.qty*books.price as harga_pinjam'))
                    ->rightJoin('members','members.id','=','transactions.member_id')
                    ->rightJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
                    ->rightJoin('books','transaction_details.book_id','=','books.id')
                    ->get();
        //No 13 semua buku yang ada di transaksi
        $data13 = Transaction::select
                    ('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price', DB::raw('transaction_details.qty*books.price as harga_pinjam'))
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->leftJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
                    ->leftJoin('books','transaction_details.book_id','=','books.id')
                    ->get();

        //No 14 semua buku yang ada di transaksi
        $data14 = Transaction::select
                    ('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price', DB::raw('transaction_details.qty*books.price as harga_pinjam'))
                    ->leftJoin('members','members.id','=','transactions.member_id')
                    ->leftJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
                    ->leftJoin('books','transaction_details.book_id','=','books.id')
                    ->leftJoin('catalogs','books.catalog_id','catalogs.id')
                    ->get();

        //No 15 
        $data15 = Book::select('*')
                    ->join('catalogs','catalogs.id','=','books.catalog_id')
                    ->orderBy('catalogs.id','asc')
                    ->get();

        //No 16
        $data16 = Book::select('*')
                    ->leftJoin('authors','authors.id','=','books.author_id')
                    ->get();
        
        //No 17
        $data17 = Book::select(DB::raw('count(authors.id)as PG05'))
                    ->join('authors','authors.id','=','books.author_id')
                    ->where('authors.id','LIKE',"%PG05%")
                    ->get();

        //No 18
        $data18 = Book::select('*')
                    ->where('price','>',10000)
                    ->get();

        //No 19
        $data19 = Book::select('*')
                    ->join('publishers','publishers.id','=','books.publisher_id')
                    ->where('publisher_id','=',"PN01")
                    ->where('qty','>',10)
                    ->get();

        //No 20
        $data20 = Member::select('*')
                    ->whereMonth('created_at',6)
                    ->get();

        return $data20;


        return view('home');

    }
}
