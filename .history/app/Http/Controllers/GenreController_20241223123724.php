<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
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
        //
        
        return view('addgenre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                Rule::unique('publishers', 'name') // Check for unique names in the 'publishers' table
            ]
           
        ];
    
        $messages = [
            'name.regex' => 'The name must not contain special characters or numbers.',
            'name.unique' => 'The publisher name already exists.',
        ];
        
        $validator= Validator::make($request->all(),$rules,$messages);

        if($validator->fails()) {   
            return redirect()->route('publisher.create')->withInput()->withErrors($validator);

        }
        // if (DB::table('publishers')->where('name', $request->name)->exists()) {
        //     $messages['name.unique'] = 'The publisher name already exists.';
        //     $rules['name'] .= '|unique:publishers,name';
        // }

        $publisher = new Genre();
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('Genre.index')->with('sucess','New publisher added sucesfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
