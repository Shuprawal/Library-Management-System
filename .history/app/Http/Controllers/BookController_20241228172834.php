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

        
     

        DB::commit();

    

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
        // $book=Book::with(['genres','authors','publishers'])-> findOrFail($id);
        $book = Book::with(['genres', 'authors', 'publisher'])->findOrFail($id);

        $genres=Genre::all();
        $publishers=Publisher::all();
        $authors=Author::all();
        return view('bookEdit', compact('book','genres','publishers','authors'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, $id)
    {
        $book =Book::findOrFail($id);
        $rules = [
    
            'name' => ['required'],
            'isbn' => ['required'],
            'available_copies' => ['required', 'numeric', 'min:1'], 
           'publisherID' => ['required', 'exists:publishers,id'], 
                     
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
           $pathOfPhoto= null;
           if ($request->hasFile('image')) {
               $pathOfPhoto = $request->file('image')->store('uploads/books', 'public');
           }
   

           $book ->update([
               'name'=> $request->input('name'),
               'isbn'=> $request->input('isbn'), 
               'available_copies'=>$request->input('available_copies'),
               'publisherID'=>$request->input('publisherID'),
                'description'=>$request->input('description'),
                'image'=>$pathOfPhoto,
               
           ]);
   
           $book->authors()->sync($request->authorID);
           $book->genres()->sync($request->genreID ?? []);


           return redirect()->route('book.index');
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



    public function getBooksByGenre($id)
    {
   try{
    $books=Book::whereHas('genres',function($query)use($id))->get() ;

    if ($books->isEmpty()) {
       return redirect()->route('booklist')->with('error', 'No books found for this genre.');
   }

   return view('booklist', compact('books'));

}catch(\Exception $e){
  
    return redirect()->back()->with('error', 'An error occurred while fetching the books.');
}

   }
      
}
