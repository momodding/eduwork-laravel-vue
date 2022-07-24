<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction_details = TransactionDetail::with('books')->get();

        //return $transactions;
        return view('admin.transaction_detail.index', compact('transaction_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Security validasi backend untuk validasi input data transaction_detail untuk function create

        $this->validate($request,[
            'transaction_id', 'book_id', 'qty', 'isbn'      =>['required', 'string', 'min:5', 'max:60'],
        ]);

        // Cara pertama untuk memasukkan data ke table transaction_detail

        // $transaction_detail = new TransactionDetail;
        // $transaction_detail->name = $request->name;
        // $transaction_detail->save();

        // Cara kedua untuk memasukkan data ke table transaction_detail dan masukkan protected $fillable = ['']; ke models transaction_detail.php

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
        // return $transaction_detail; untuk tes lihat hasil data
        return view('admin.transaction_detail.edit', compact('transaction_detail'));
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
            'name'      =>['required'],
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

        return redirect('transaction_details');
    }
}
