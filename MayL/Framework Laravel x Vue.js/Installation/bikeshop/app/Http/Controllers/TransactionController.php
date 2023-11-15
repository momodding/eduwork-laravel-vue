<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

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
        return view('admin.transaction');
    }

    public function api()
    {
        $transactions = Transaction::select('transactions.id', 'member_id', 'grand_total', 'discount', 'pay', 'change', 'note', 'user_id', 'transactions.created_at', 'name', 'gender', 'address', 'email')
            ->join('members', 'transactions.member_id', '=', 'members.id')
            ->get();

        $datatables = datatables()->of($transactions)->addIndexColumn();
        return $datatables->make(true);
    }

    public function detail($id)
    {
        $transactions = Transaction::select('members.name', 'grand_total', 'discount', 'pay', 'change', 'note')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->where('transactions.id', '=', $id)
            ->first();
        //->get();

        $transaction_details = TransactionDetail::select(
            'transaction_details.id as id',
            'products.name as product_name',
            'categories.name as category_name',
            'variants.name as variant_name',
            'transaction_details.qty as qty',
            'transaction_details.price as price',
            'transaction_details.total as total',
            'transaction_details.created_at'
        )
            //$transactions = Transaction::select('*')
            //->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('variants', 'variants.id', 'products.variant_id')
            ->where('transaction_details.transaction_id', '=', $id)
            ->get();

        //$datatables = datatables()->of($transactions)->addIndexColumn();
        //return $datatables->make(true);
        //dd($transaction_details);      
        return view('admin.transaction.detail', compact('transactions', 'transaction_details'));
    }

    public function cart($id)
    {
        $carts = Cart::select('carts.id as id', 'name', 'product_id', 'price', 'carts.qty', db::raw('products.price*carts.qty as total'),)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('member_id', '=', $id)
            ->get();

        //$datatables = datatables()->of($carts)->addIndexColumn();
        // return $datatables->make(true);
        return json_encode($carts);
    }

    public function check(Request $request)
    {

        $this->validate($request, [
            'member_id' => ['required'],
            'payment' => ['required'],
        ]);

        $member_id = $request->input('member_id');

        //$carts = Cart::select('*')
        $carts = Cart::select('carts.id as id','carts.product_id as product_id','products.qty as productQty','carts.qty as cartQty','products.price as price')
            ->join('products','carts.product_id','=','products.id')
            ->where('member_id', '=', $member_id)
            ->get();

        //-->> Transaction
        $newTransaction = [
            'member_id' => $request['member_id'],
            'grand_total' =>  $request->input('grandTotal'),
            'discount'=> '0',
            'pay'=>  $request->input('grandTotal'),
            'change'=> '0',
            'note'=>'tidak ada',
            'payment'=>$request->input('payment'),
        ];

        $transaction = Transaction::create($newTransaction);
        
        $lastestTransaction = Transaction::select('id')
        ->where('member_id','=',$member_id )
        ->orderBy('created_at','desc')
        ->first();

        foreach ($carts as $cart) {
            

            $transactionDetail=[
                'transaction_id' => $lastestTransaction->id,
                'product_id' => $cart->product_id,
                'qty'=>$cart->cartQty,
                'price'=>$cart->price,
                'total'=>$cart->qty*$cart->price,
                ];
            $transactionDetail = TransactionDetail::create($transactionDetail);
            $cart->delete($cart->id);

            $productOut = Product::where('id','=',$cart->product_id)->first();
            $productOut->qty = $cart->productQty - $cart->cartQty;
            $productOut->save();
        };      

        return ('success');
        //return $newTransaction;
    }

    public function spatie()
    {
        //$role = Role::create(['name'=>'member']);
        //$permission = Permission::create(['name'=>'cart']);

        //$role->givePermissionTo($permission);
        //$permission->assignRole($role);

        //$user = auth()->user();
        //$user->assignRole('member');
        // return $user;

        $user = User::with('roles')->get();
        return $user;

        //$user = auth()->user();
        //$user->removeRole('petugas');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaction_number = Transaction::count();
        $members = Member::select('members.id', 'members.name')
            ->rightJoin('carts', 'members.id', '=', 'carts.member_id')
            ->groupBy('members.name')
            ->get();

        //$carts = Cart::all();

        //dd($carts);

        return view('admin.transaction.create', compact('transaction_number', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
