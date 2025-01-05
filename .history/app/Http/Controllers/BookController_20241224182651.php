<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use App\Models\Book_author;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('addbook');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     $publishers = Publisher::all();
    //     $genres = Genre::all();
    //     $authors = Author::all();

    // return view('kitab', compact('publishers', 'genres', 'authors'));

    return view('kitab');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = [
    
         'name' => ['required', Rule::unique('books', 'name')],
         'isbn' => ['required', Rule::unique('books', 'isbn')],
         'available_copies' => ['required', 'numeric', 'min:1'], // Adjusted key to match 'available_copies'
        'publisherID' => ['required', 'exists:publishers,id'], // Adjusted to match 'publisherID' in the schema
        'image' => ['required', 'image', 'max:2048'], // 2MB max for image
        //  'author'=>['required'],
        //  'genre'=>['required'],
        'description'=>['required']
        
    ];

    $messages = [
        'name.required' => 'The book name is required.',
        'name.unique' => 'A book with this name already exists.',
        'isbn.required' => 'The ISBN is required.',
        'isbn.unique' => 'This ISBN is already in use by another book.',
        'available_copies.required' => 'The number of available copies is required.',
        'available_copies.min' => 'The number of available copies must be at least 1.',
        'publisherID.required' => 'The publisher is required.',
        'image.max' => 'The image size must not exceed 2MB.',
        'author.required' => 'Author is required.',
        'genre.required' => 'Genre is required.',
    ];

    $validator = Validator::make($request->all(), $rules,$messages);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors and try again.');
    }

    try {
        DB::beginTransaction();
    
        $pathOfPhoto = $request->hasFile('image') 
            ? $request->file('image')->store('uploads/books', 'public') 
            : null;
    
        $book = Book::create([
            'name' => $request->name,
            'isbn' => $request->isbn,
            'available_copies' => $request->available_copies,
            'publisherID' => $request->publisherID,
            'description' => $request->description,
            'image' => $pathOfPhoto,
        ]);
    
        if ($request->has('authorID')) {
            $book->authors()->attach($request->authorID);
        }
    
        DB::commit();
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error adding book: ' . $e->getMessage());
        return back()->withInput()->withErrors(['error' => 'Failed to save book.']);
    }
    

    /**
     * Display the specified resource.
     */
    // public function show(book $book)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
      */
    // public function edit(book $book)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, book $book)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(book $book)
    // {
    //     //
    // }
}
}