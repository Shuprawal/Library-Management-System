<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpublisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules=[
            'name'=>'required|min:10',
            'address'=>'required|min:10'
        ];
        
        $validator::make($request->all(),$rules);

        if($validator->fails(){
            return redirect()->route('publidher.create')-withInputs()->withErrors($validator);

        }) 
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
