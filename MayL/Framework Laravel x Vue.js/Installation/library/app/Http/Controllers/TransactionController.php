<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
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
        $transactions = Transaction::select('transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty','books.price','status')
        ->leftjoin('members','transactions.member_id','=','members.id')
        ->leftjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->orderBy('transaction_details.created_at','desc')
        ->get();
        
        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();
        //return $transactions;

        return view('admin.transaction.index', compact('transactions','overdueUsers'));
    }

    public function api(){
        $transactions = Transaction::select('transaction_details.id as transaction_details_id','transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty',DB::raw('transaction_details.qty*books.price as rentPrice'),'status','transaction_details.id')
        ->join('members','transactions.member_id','=','members.id')
        ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->join('books','books.id','=','transaction_details.book_id')
        ->orderBy('transaction_details.created_at','desc')
        ->get();

        $datatables = datatables()->of($transactions)->addIndexColumn();

        //return json_decode($transactions);
        return $datatables->make(true);
    }

    public function detail($id){
        $transactions = Transaction::select('transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty',DB::raw('transaction_details.qty*books.price as rentPrice'),'status','transaction_details.id')
        ->join('members','transactions.member_id','=','members.id')
        ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->join('books','books.id','=','transaction_details.book_id')
        ->where('transaction_details.id','=',$id)
        ->first();

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        //return json_decode($transactions);
        return view ('admin.transaction.detail',compact('transactions','overdueUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::select('*')
                        ->where('qty','>','0')
                        ->get();
        $members = Member::all();
        //return $books;
        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        return view('admin.transaction.create', compact('books','members','overdueUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'member_id' =>['required'],
            'status' =>['required'],
            'date_start' =>['required'],
            'date_end' =>['required'],
        ]);

        $transaction = Transaction::create($request->all());

        TransactionDetail::create(array_merge($request->all(),['transaction_id'=>$transaction->id]) );
        $book = Book::where('id',$request->input('book_id'))->first();
        $book->qty=$book->qty-$request->input('qty');
        $book->save();
        // ->update(
        //     [
        //         'qty'=>$request->input('qty')
        //     ]
        // );
        //Book::update($request->get(book_id)->qty(-1));

        return redirect('transactions');
        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transactions = Transaction::select('transactions.id as transactions_id','transaction_details.id as transaction_details_id','books.id as book_id','transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty',DB::raw('transaction_details.qty*books.price as rentPrice'),'status','transaction_details.id')
        ->join('members','transactions.member_id','=','members.id')
        ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->join('books','books.id','=','transaction_details.book_id')
        ->where('transaction_details.id','=',$id)
        ->first();
        //$datatables = datatables()->of($transactions)->addIndexColumn();

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        //dd($transactions);
        //return json_decode($transactions);
        return view ('admin.transaction.edit',compact('transactions','overdueUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //dd($transaction);
        // $this->validate($request,[
        //     'status' => ['required'],
        // ]);

        $transaction->update($request->all());
        // TransactionDetail::create(array_merge($request->all(),['transaction_id'=>$transaction->id]));
        $book = Book::where('id',$request->input('book_id'))->first();
       
        if ($request->statusBefore ==0 && $request->status==1){
            //dd($request);
            $book->qty = $book->qty + $request->input('qty');
            $book->save();
            return redirect('transactions'); 
        }
        else{
            $book->save();
            return redirect('transactions');
        };
        

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        return redirect('transactions',compact('overdueUsers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDetail $transaction)
    {
        $transaction->delete();
        Transaction::where('id',$transaction->transaction_id)->delete();
    }

    public function filterStatus($status){
        $transactions = Transaction::select('transaction_details.id as transaction_details_id','transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty',DB::raw('transaction_details.qty*books.price as rentPrice'),'status','transaction_details.id')
        ->join('members','transactions.member_id','=','members.id')
        ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->join('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=', $status)
        ->orderBy('transaction_details.created_at','desc')
        ->get();
        
        //dd($transactions);
        //return view ('admin.transaction.index',compact('transactions'));
        $datatables = datatables()->of($transactions)->addIndexColumn();

        //return json_decode($transactions);
        return $datatables->make(true);
    }

    public function filterDate(Request $request){
        //dd($request);
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');

        $transactions = Transaction::select('transaction_details.id as transaction_details_id','transactions.date_start','transactions.date_end','members.name','books.title','transaction_details.qty',DB::raw('transaction_details.qty*books.price as rentPrice'),'status','transaction_details.id')
        ->join('members','transactions.member_id','=','members.id')
        ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->join('books','books.id','=','transaction_details.book_id')
        ->whereBetween('transactions.date_start',[$date_start,$date_end])
        ->orderBy('transaction_details.created_at','desc')
        ->get();
        
        //dd($transactions);
        //return view ('admin.transaction.index',compact('transactions'));
        $datatables = datatables()->of($transactions)->addIndexColumn();

        //return json_decode($transactions);
        return $datatables->make(true);
    }
}
