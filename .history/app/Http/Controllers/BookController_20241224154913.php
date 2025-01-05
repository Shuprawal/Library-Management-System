<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Author;
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
        
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors and try again.');
    }

    try {
        $pathOfPhoto= null;
        if ($request->hasFile('image')) {
            $pathOfPhoto = $request->file('image')->store('uploads/books', 'public');
        }

        $book = Book::create([
            'name'=> $request->input('name'),
            'isbn'=> $request->input('isbn'), 
            'available_copies'=>$request->input('available_copies'),
            'publisherID'=>$request->input('publisherID'),
             'description'=>$request->input('description'),
             'image'=>
            
        ]);
        $book->name ;
        $book->isbn = ;
        $book->available_copies = ; // Matches schema
        $book->publisherID = ; // Matches schema
        $book->description = ;

        $book->image= $pathOfPhoto;

        // $book = Book::create($request->only(['name', 'isbn', 'available_copies', 'publisherID', 'description']));
        // $book->name = $request->input('name');
        // $book->isbn = $request->input('isbn');
        // $book->available_copies = $request->input('available_copies'); // Matches schema
        // $book->publisherID = $request->input('publisherID'); // Matches schema
        // $book->description = $request->input('description');

        // $book->image= $pathOfPhoto; 

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('uploads/books', 'public');
        //     $book->image = $imagePath;
        // }
        $book->save();



        // $book = new Book();
        // $book->name = $request->input('name');
        // $book->isbn = $request->input('isbn');
        // $book->available_copies = $request->input('available_copies'); // Matches schema
        // $book->publisherID = $request->input('publisherID'); // Matches schema
        // $book->description = $request->input('description');


       // $book->desption = $request->input('ription');
         

        

        

        // return redirect()->back();
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    } catch (\Exception $e) {
        Log::error('Error adding book: ' . $e->getMessage());
        return back()->withInput()->with('error', 'An unexpected error occurred while saving the book.');
    }
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
