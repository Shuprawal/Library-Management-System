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
    public function edit($id)
    {
        $author=Author::findOrFail($id);
        return view('authorEdit',[
            'author'=>$author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $rules = [
            $author=Author::findOrFail($id)
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
    
        Author::update(['name' => $request->name]);
    
        return redirect()->route('author.index')->with('success', 'New author added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{

            $author=Author::findOrFail($id);
            if($author->books()->exists()){
                return redirect()->back()->with('error', 'Cannot delete author with associated books.');
            }
            $author->Delete();
            return redirect()->route('authorlist')->with('Author was deleted');
        }catch(\Exception $e){
            return redirect()->route('authorlist')->with(' error!!, Author was not deleted');
        }

    }
}
