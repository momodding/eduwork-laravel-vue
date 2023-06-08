<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Catalog;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CatalogController extends Controller
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
        $catalogs = Catalog::with('catalogs')->get();

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        return view('admin.catalog.index', compact('catalogs','overdueUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        return view('admin.catalog.create',compact('overdueUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$catalog = new Catalog;
        //$catalog->name = $request->name;
        //$catalog->save();

        $this->validate($request,[
            'name' =>['required'],
        ]);

        Catalog::create($request->all());

        return redirect('catalogs');

        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();
        //return $catalog;
        return view('admin.catalog.edit', compact('catalog','overdueUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog): RedirectResponse
    {
        $this->validate($request,[
            'name' =>['required'],
        ]);

        $catalog->update($request->all());

        return redirect('catalogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog) 
    {
        $catalog->delete();

        return redirect('catalogs');
    }
}
