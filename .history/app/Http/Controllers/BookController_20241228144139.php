<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_genre;
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
    $books = Book::with(['authors', 'genres', 'publisher'])->get();
    return view('allbooklist', compact('books'));
}


public function home()
{
    // $books = Book::with(['authors', 'genres', 'publisher'])->get();
    // return view('list', compact('books'));
    $books = Book::all();
    return view('list', compact('books'));
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
        'description'=>['required'],
        'authorID' => 'required|array|min:1',
        'authorID.*' => 'exists:authors,id',
        'genreID' => 'nullable|array',
        'genreID.*' => 'exists:genres,id',
        
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
             'image'=>$pathOfPhoto,
            
        ]);

        // Fetch the selected author IDs
        $selectedAuthors = $request->input('authorID');

        // Ensure authors are selected
        if (!empty($selectedAuthors)) {
            foreach ($selectedAuthors as $authorID) {
                Book_author::create([
                    'bookID' => $book->id,
                    'authorID' => $authorID, // Use the correct author ID
                ]);
            }
        }

        $selectedGenres = $request->input('genreID');

        // Ensure authors are selected
        if (!empty($selectedGenres)) {
            foreach ($selectedGenres as $genreID) {
                Book_genre::create([
                    'book_ID' => $book->id,
                    'genre_ID' => $genreID, // Use the correct author ID
                ]);
            }
        }

        
        // Book_author::create([
        //     'bookID' => $book->id,
        //      'authorID' => $request->input('authorsInput')
            
        // ]);

        // if ($request->has('authorInput')) {
        //     $book->authors()->attach($request->authorID);
        //     $book->authors()->attach($request->input('authorID'));

        // }

        DB::commit();

        // $book_author= Book_author::create([
        //     'author'=>$request->input('authorID'),
        //     'isbn'=>$request->input('bookID')
        // ]);
       
       

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
        // $book->save();



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
    public function show($id)
    {
      try{
         $book=Book::findOrFail($id) ;
         
         $morebooks= Book::whereHas('authors',function($query) use ($book){
            $query->whereIn('authors.id',$book->authors->pluck('id'));

         })->where('id','!=',$book->id)->get();

        return view('book', compact('book','morebooks'));
     }catch(\Exception $e){
        //\Log::error('Error fetching book: ' . $e->getMessage());
        return redirect()->back()->with('error occured');
     } 
    }

    /**
     * Show the form for editing the specified resource.
      */
    public function edit($id)
    {
        $book=Book::with(['genres','authors','publishers'])-> findOrFail($id);
        $genres=Genre::all();
        $publisherd=Publisher::all();
        $authors=Authors::all();
        return view('bookEdit',[
            'book'=>$book
        ]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, book $book)
    {
        //
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($id)
    {
        try{
            $book=Book::findOrFail($id);
            $book->delete();
            return redirect()->route('allbooklist')->with('book deleted');
        }catch(\Exception $e){
            return redirect()->route('allbooklist')->with(' error!!, Book was not deleted');
        }
    }
}
