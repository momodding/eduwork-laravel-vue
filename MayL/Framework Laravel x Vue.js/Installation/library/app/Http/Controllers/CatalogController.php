<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::with('catalogs')->get();

        //return $catalogs;
        return view('admin.catalog.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalog.create');
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
        //return $catalog;
        return view('admin.catalog.edit', compact('catalog'));
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
