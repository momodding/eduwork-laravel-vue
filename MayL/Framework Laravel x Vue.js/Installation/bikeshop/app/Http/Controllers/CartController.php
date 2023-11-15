<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        //dd($products);
        return view('member.index',compact('products'));
    }

    public function api(){
        $carts = Cart::all();

        // $carts = Cart::select('*')
        // ->groupby('carts.member_id')
        // ->orderby('asc');
        return $carts;
    }

    public function cart($id)
    {
        $cartItem = Cart::select('carts.id as id','name','product_id','price','carts.qty',db::raw('products.price*carts.qty as total'),'products.qty as qty_max')
        ->join('products','carts.product_id','=','products.id')
        ->where('member_id','=',$id)
        ->get();

        $cartItemUser = datatables()->of($cartItem)->addIndexColumn();

        return $cartItemUser->make(true);
        //return $cartItem;
    }

    public function min($id){
        $cartMin = Cart::select('*')
        ->where('id','=',$id)
        ->first();

        $cartMin->qty = $cartMin->qty-1;
        $cartMin->save();
    }

    public function plus($id){
        $cartPlus = Cart::select('*')
        ->where('id','=',$id)
        ->first();

        $cartPlus->qty = $cartPlus->qty+1;
        $cartPlus->save();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request);

        $memberAdd = $request->member_id;

        $productAdd = $request->product_id;

        $countCartModel = Cart::select('*')
        ->where('member_id','=',$memberAdd)
        ->where('product_id','=',$productAdd)
        ->count();

        $cartModel = Cart::
        where('member_id','=',$memberAdd)
        ->where('product_id','=',$productAdd)
        ->first();
        
        if($countCartModel == 0){
            $this->validate($request,[
                    'member_id'=>['required'],
                    'product_id'=>['required'],
                    'qty'=>['required']
                ]);
        
                Cart::create($request->all());
        
                return redirect('carts');
        }
        else{
            $cartModel->qty = $cartModel->qty+1;
            $cartModel->save();

            return redirect('carts');
        };

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        dd($cart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //dd($carts);        
        $cart->delete();
    }
}
