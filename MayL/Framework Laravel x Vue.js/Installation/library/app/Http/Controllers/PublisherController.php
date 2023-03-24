<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherController extends Controller
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
        $publishers = Publisher::with('publishers')->get();

        return view('admin.publisher');
    }

    public function api()
    {
        $publishers = publisher::all();
        $datatables = datatables()->of($publishers)->addIndexColumn();

        return $datatables->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>['required','max:64'],
            'email' =>['required'],
            'phone_number' =>['required','numeric'],
            'address' =>['required'],
        ]);

        Publisher::create($request->all());

        return redirect('publishers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //return view('admin.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $this->validate($request,[
            'name' => ['required'],
        ]);

        $publisher->update($request->all());

        return redirect('publishers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect('catalogs');
    }
}
