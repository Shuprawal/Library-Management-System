<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $genres = Genre::all();
        return view('genrelist', compact('genres'));
       
  
    }
    // public function try()
    // {
    //     $genres = Genre::all();
    //     return view('layouts.try', compact('genres'));
    // }

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
            Rule::unique('genres', 'name')
        ]
    ];

    $messages = [
        'name.regex' => 'The name must not contain special characters or numbers.',
        'name.unique' => 'Genre already exists.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->route('genre.create')->withInput()->withErrors($validator);
    }

    Genre::create(['name' => $request->name]);

    return redirect()->route('genre.index')->with('success', 'New genre added successfully.');
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
    public function destroy($id)
    {
        try{
            $genre=Genre::findOrFail($id);
            $genre->delete();
            return

        }catch(\Exception $e){

        }
    }
}
