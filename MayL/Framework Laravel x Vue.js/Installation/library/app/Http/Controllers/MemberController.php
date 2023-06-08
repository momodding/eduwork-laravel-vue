<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberController extends Controller
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

        return view('admin.member',compact('overdueUsers'));
    }

    public function api()
    {
        $members = member::all();
        $datatables = datatables()->of($members)
                                ->addColumn('date', function($member){
                                    return convert_date($member->created_at);
                                })
                                ->addIndexColumn();

        return $datatables->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
            'gender' =>['required'],
            'email' =>['required'],
            'phone_number' =>['required'],
            'address' =>['required'],
        ]);

        Member::create($request->all());

        return redirect('members');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request,[
            'name' =>['required','max:64'],
            'gender' =>['required'],
            'email' =>['required'],
            'phone_number' =>['required'],
            'address' =>['required'],
        ]);

        $member->update($request->all());

        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
    }
}
