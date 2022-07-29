<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
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
        // $books = Book::with('publisher')->get();
        // $authors = Author::with('books')->get();
        // dd($catalogs = Catalog::with('books')->get());
        // $publishers = Publisher::with('books')->get();

        // Contoh Query Builder
        
        // // Nomor 1
        //     $data = Member::select('*')
        //                 ->join('users','users.member_id','=','members.id')
        //                 ->get();

        // // Nomor 2
        //     $data2 = Member::select('*')
        //                 ->leftJoin('users','users.member_id','=','members.id')
        //                 ->where('users.id','=',NULL)
        //                 ->get();

        // // Nomor 3
        //     $data3 = Transaction::select('members.id','members.name')
        //                 ->rightJoin('members','members.id','=','transactions.member_id')
        //                 ->where('transactions.member_id','=',NULL)
        //                 ->get();

        // // Nomor 4
        //     $data4 = Member::select('members.id','members.name','members.phone_number')
        //                 ->join('transactions','transactions.member_id','=','members.id')
        //                 ->orderBy('members.id','asc')
        //                 ->get();

        // // Nomor 5
        //     $data5 = Member::select('members.id','members.name','members.phone_number')
        //                 ->rightJoin('transactions','members.id','=','transactions.member_id')
        //                 ->groupBy('member_id')
        //                 ->having(\DB::raw('count(transactions.member_id)'),'>','1')
        //                 ->get();

        // // Nomor 6
        //     $data6 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->get();

        // // Nomor 7
        //     $data7 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->whereMonth('transactions.date_end','=','6')
        //                 ->get();

        // // Nomor 8
        //     $data8 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->whereMonth('transactions.date_start','=','5')
        //                 ->get();

        // // Nomor 9
        //     $data9 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->whereMonth('transactions.date_start','=','6')
        //                 ->whereMonth('transactions.date_end','=','6')
        //                 ->get();

        // // Nomor 10
        //     $data10 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->where('members.address','=','Bandung')
        //                 ->get();

        // // Nomor 11
        //     $data11 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end', 'members.gender')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->where('members.address','=','Bandung')
        //                 ->where('members.gender','=','P')
        //                 ->get();

        // // Nomor 12
        //     $data12 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->join('transaction_details', 'members.id','=','transaction_details.transaction_id')
        //                 ->join('books','transaction_details.isbn','=','books.isbn')
        //                 ->where('transaction_details.qty','>','1')
        //                 ->orderBy('transactions.member_id','asc')
        //                 ->get();

        // // Nomor 13
            // $data13 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price','transaction_details.qty*books.price')
            //             ->join('transactions','members.id','=','transactions.id')
            //            ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
            //             ->join('books','transaction_details.isbn','=','books.isbn')
            //             ->join('publishers','books.publisher_id','=','publishers.id')
            //             ->join('authors','books.author_id','=','authors.id')
            //             ->get();

        // // Nomor 14
        //     $data14 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','publishers.name','authors.name','catalogs.name')
        //                 ->join('transactions','members.id','=','transactions.id')
        //                 ->join('transaction_details', 'members.id','=','transaction_details.transaction_id')
        //                 ->join('books','transaction_details.isbn','=','books.isbn')
        //                 ->join('publishers','books.publisher_id','=','publishers.id')
        //                 ->join('authors','books.author_id','=','authors.id')
        //                 ->join('catalogs','books.catalog_id','=','catalogs.id')
        //                 ->get();

        // // Nomor 15
        //     $data15 = Book::select('catalogs.id','catalogs.name','books.title')
        //                 ->join('catalogs','books.catalog_id','=','catalogs.id')
        //                 ->get();

        // // Nomor 16
        //     $data16 = Book::select('books.isbn','books.title','books.publisher_id','books.author_id','books.catalog_id','books.qty','books.price','publishers.name','publishers.email','publishers.phone_number','publishers.address')
        //                 ->leftJoin('publishers','books.publisher_id','=','publishers.id')
        //                 ->get();

        // // Nomor 17
        //     $data17 = Book::select('*')
        //                 ->where('books.author_id','=','17')
        //                 ->get();

        // // Nomor 18
        //     $data18 = Book::select('*')
        //                 ->where('books.price','>=','15000')
        //                 ->get();

        // // Nomor 19
        //     $data19 = Book::select('*')
        //                 ->where('books.author_id','=','17')
        //                 ->where('books.qty','>=','15') 
        //                 ->get();

        // // Nomor 20
        //     $data20 = Member::select('*')
        //                 ->whereMonth('members.created_at','=','07')
        //                 ->get();

        //return $data;
        return view('home');
    }
}
