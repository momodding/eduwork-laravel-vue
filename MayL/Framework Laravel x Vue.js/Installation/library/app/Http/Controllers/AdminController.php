<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {        
        $total_book = Book::count();
        $total_member = Member::count();
        $total_publisher = Publisher::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();

        $data_donut = Book::select(DB::raw("count(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id','asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id','asc')->join('books','books.publisher_id','=','publishers.id')->groupBy('name')->pluck('name');

        $label_bar = ['Start','End'];
        $data_bar = [];

        foreach($label_bar as $key => $value){
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundcolor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1';
            $data_month = [];

            foreach (range(1,12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_start',$month)->first()->total;
                
                }else {
                    $data_month[] = Transaction::select(DB::raw("count(*) as total"))->whereMonth('date_end',$month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        $currentTime = Carbon::now();
        $overdueUsers = Transaction::select('members.name')
        ->rightjoin('members','transactions.member_id','=','members.id')
        ->rightjoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        ->leftjoin('books','books.id','=','transaction_details.book_id')
        ->where('transactions.status','=','0','and','transactions.date_end','>',$currentTime)
        ->get();
        //dd($overdueUsers);

        return view('admin.dashboard', compact('total_book','total_member','total_publisher','total_transaction','data_donut','label_donut','data_bar','overdueUsers'));
    }

    public function test_spatie()
    {
        // $role = Role::create(['name'=>'petugas']);
        // $permission = Permission::create(['name'=>'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user= auth()->user();
        $user->assignRole('petugas');
        return $user;

        // $user = User::with('roles')->get();
        // return $user;

        // $user = auth()->user();
        // $user->removeRole('petugas');


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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }


}
