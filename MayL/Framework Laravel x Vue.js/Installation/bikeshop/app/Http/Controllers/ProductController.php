<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variants = Variant::all();
        $categories = Category::all();
        $products = Product::select('products.name as product_name','categories.name as category_name','variants.name as variant_name','qty','price')
        ->join('categories','products.category_id','=','categories.id')
        ->join('variants','products.variant_id','=','variants.id')
        ->get();

        return view('admin.product', compact('variants','categories','products'));
    }

    public function api(){
        $products = Product::select('products.id as id','products.name as product_name','products.category_id as category_id','categories.name as category_name','products.variant_id as variant_id','variants.name as variant_name','qty','price')
        ->join('categories','products.category_id','=','categories.id')
        ->join('variants','products.variant_id','=','variants.id')
        ->get();
        //$products = Product::all();

        $datatables = datatables()->of($products)->addIndexColumn();
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
            'name'=>['required'],
            'category_id'=>['required'],
            'variant_id'=>['required'],
            'qty'=>['required'],
            'price'=>['required'],
        ]);

        //return $request;
        Product::create($request->all());

        return redirect('products');
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
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>['required'],
            'category_id'=>['required'],
            'variant_id'=>['required'],
            'qty'=>['required'],
            'price'=>['required'],
        ]);

        //return $request;
        $product->update($request->all());

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
