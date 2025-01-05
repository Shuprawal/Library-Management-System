<?php

namespace App\Http\Controllers;

use App\Models\Boook;
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
        return view('addbook');
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
    $rules = [
        'name' => ['required', Rule::unique('books', 'name')],
        'isbn' => ['required', Rule::unique('books', 'isbn')],
        'available_copies' => ['required', 'numeric', 'min:1'], // Adjusted key to match 'available_copies'
        'publisherID' => ['required', 'exists:publishers,id'], // Adjusted to match 'publisherID' in the schema
        'image' => ['required', 'image', 'max:2048'], // 2MB max for image
        'description' => ['required']
    ];

    $messages = [
        'name.required' => 'The book name is required.',
        'name.unique' => 'A book with this name already exists.',
        'isbn.required' => 'The ISBN is required.',
        'isbn.unique' => 'This ISBN is already in use by another book.',
        'available_copies.required' => 'The number of available copies is required.',
        'available_copies.numeric' => 'The available copies must be a number.',
        'available_copies.min' => 'The number of available copies must be at least 1.',
        'publisherID.required' => 'The publisher is required.',
        'publisherID.exists' => 'The selected publisher is invalid.',
        'image.required' => 'An image of the book is required.',
        'image.image' => 'The uploaded file must be a valid image.',
        'image.max' => 'The image size must not exceed 2MB.',
        'description.required' => 'A description of the book is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors and try again.');
    }

    // try {

        $book = new Boook();
        $book->name = $request->input('name');
        $book->isbn = $request->input('isbn');
        $book->available_copies = $request->input('available_copies'); // Matches schema
        $book->publisherID = $request->input('publisherID'); // Matches schema
        $book->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_images', 'public');
            $book->image = $imagePath;
        }

        $book->save();

        return redirect()->back()
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    // } catch (\Exception $e) {
    //     \Log::error('Error adding book: ' . $e->getMessage());
    //     return back()->withInput()->with('error', 'An unexpected error occurred while saving the book.');
    // }
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
