<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authorlist', compact('authors'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.addauthor');
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
                Rule::unique('authors', 'name')
            ]
        ];

        $messages = [
            'name.regex' => 'The name must not contain special characters or numbers.',
            'name.unique' => 'Author already exists.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('author.create')->withInput()->withErrors($validator);
        }
    
        Author::create(['name' => $request->name]);
    
        return redirect()->route('author.index')->with('success', 'New author added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $authorid)
    {
        try{

            $author=Author::findOrFail($authorid);
            $author->Delete();
            return redirect()->route('everylist')->with('Author was deleted')
        }catch(){

        }

    }
}
