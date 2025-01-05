<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

        $rules = [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'address' => 'required',
        ];
        $message = [
            'name.regex' => 'The name must not contain special characters.',
        ];
        
        $validator= Validator::make($request->all(),$rules,$message);

        if($validator->fails()) {   
            return redirect()->route('publisher.create')->withInput()->withErrors($validator);

        }
        if (DB::table('publishers')->where('name', $request->name)->exists()) {
            $message['name.unique'] = 'The publisher name already exists.';
            $rules['name'] .= '|unique:publishers,name';
        }

        $publisher=new Publisher();
        $publisher->name = $request->name;
        $publisher->address = $request->addre;
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
