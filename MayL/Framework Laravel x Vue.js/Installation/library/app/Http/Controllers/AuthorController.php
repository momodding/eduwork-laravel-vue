<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Author;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
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
        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();

        //return view('admin.author', compact('authors'));
        return view('admin.author', compact('overdueUsers'));
    }

    public function api()
    {
        $authors = author::all();

        // foreach ($authors as $key => $author){
        //     $author->date = convert_date($author->created_at);
        // }

        $datatables = datatables()->of($authors)
                                ->addColumn('date', function($author){
                                    return convert_date($author->created_at);
                                })
                                ->addIndexColumn();

        return $datatables->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>['required','max:64'],
            'email' =>['required'],
            'phone_number' =>['required'],
            'address' =>['required'],
        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name' =>['required','max:64'],
            'email' =>['required'],
            'phone_number' =>['required'],
            'address' =>['required'],
        ]);

        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
