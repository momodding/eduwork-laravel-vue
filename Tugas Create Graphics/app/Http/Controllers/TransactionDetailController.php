<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
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
    public function index()
    {
        return view('admin.transaction_detail');
    }

    public function api()
    {
        $transaction_details = TransactionDetail::all();

        foreach ($transaction_details as $key => $transaction_detail) {
            $transaction_detail->date = convert_date($transaction_detail->created_at);
        }

        // $datatables = datatables()->of($transaction_details)
        //                     ->addColumn('date', function($transaction_detail) {
        //                         return convert_date($transaction_detail->created_at);
        //                     })->addIndexCoumn();

        $datatables = datatables()->of($transaction_details)->addIndexColumn();

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
            'transaction_id' => ['required'],
            'book_id' => ['required'],
            'qty' => ['required'],
            'isbn' => ['required'],
            ]);

            TransactionDetail::create($request->all());

            return redirect('transaction_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        $this->validate($request,[
            'transaction_id' => ['required'],
            'book_id' => ['required'],
            'qty' => ['required'],
            'isbn' => ['required'],
        ]);

        $transaction_detail->update($request->all());

        return redirect('transaction_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        $transaction_detail->delete();
    }
}
