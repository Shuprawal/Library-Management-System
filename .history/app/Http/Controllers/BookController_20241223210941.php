<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
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
        $publishers = Publisher::all();
    $genres = Genre::all();
    $authors = Author::all();

    return view('kitab', compact('publishers', 'genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>[
                'required',
                Rule::unique('books','name')
            ],
            'isbn'=>[
                'required',
                Rule::unique('books','isbn')
            ],

            'available copy'=>[
                'numeric',
                'required',
                min(1)
            ],
            'publisherid'=>[
                'required'
            ],
            'image'=>[
                'required'
            ],
            'description'=>[
                'required'
            ]
        ];

    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}
