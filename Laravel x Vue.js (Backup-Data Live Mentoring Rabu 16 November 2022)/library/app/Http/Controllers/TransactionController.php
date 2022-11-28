<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->status) {
            $datas = Transaction::where('status', $request->status)->get();
        } else {
            $datas = Transaction::all();
        }

        if ($request->daterange) {
            $datas = Transaction::where('daterange', $request->daterange)->get();
        } else {
            $datas = Transaction::all();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        // return $datatables->make(true);

        return view('admin.transaction');
    }

    public function api(Request $request)
    {

        if ($request->status) {
            $transactions = Transaction::where('status', $request->status)->get();
        } else {
            $transactions = Transaction::all();
        }

        if ($request->startdate && $request->enddate) {
            dd($request->startdate.'-'.$request->enddate);
            $datas = Transaction::whereBetween('daterange', $request->daterange)->get();
        } else {
            $datas = Transaction::all();
        }

        $datatables = datatables()->of($transactions)->addIndexColumn();

        // return $datatables->make(true);

        foreach ($transactions as $key => $transaction) {
            $transaction->date = convert_date($transaction->created_at);
        }

        // $datatables = datatables()->of($transactions)
        //                     ->addColumn('date', function($transaction) {
        //                         return convert_date($transaction->created_at);
        //                     })->addIndexColumn();

        $datatables = datatables()->of($transactions)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
            $this->validate($request,[
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'duration' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
            'status' => ['required'],
            ]);

            Transaction::create($request->all());

            return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->validate($request,[
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'duration' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
            'status' => ['required'],
        ]);

        $transaction->update($request->all());

        return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    }
}
