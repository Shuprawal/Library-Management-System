<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Borrow;
use App\Models\Review;
use App\Models\User;
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
            'description' => ['required'],
            'authorID' => 'required|array|min:1',
            'authorID.*' => 'exists:authors,id',
            'genreID' => 'nullable|array',
            'genreID.*' => 'exists:genres,id',
            'published_date'=>'required|date|before:today',
            'total_pages'=>['required','numeric', 'min:1'],
            'language'=>'required',
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
            'total_pages.min' => 'The total pages must be at least 1.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors and try again.');
        }


        try {
            DB::beginTransaction();
            $pathOfPhoto = null;
            if ($request->hasFile('image')) {
                $pathOfPhoto = $request->file('image')->store('uploads/books', 'public');
            }

            $book = Book::create([
                'name' => $request->input('name'),
                'isbn' => $request->input('isbn'),
                'available_copies' => $request->input('available_copies'),
                'publisherID' => $request->input('publisherID'),
                'description' => $request->input('description'),
                'image' => $pathOfPhoto,
                'published_date'=>$request->input('published_date'),
                'total_pages'=>$request->input('total_pages'),
                'language'=>$request->input('language'),
            ]);

           
            $book->authors()->sync($request->authorID);
            $book->genres()->sync($request->genreID ?? []);

            DB::commit();



            return redirect()->route('books.home')->with('success', 'Book added successfully!');

        } catch (\Exception $e) {
            Log::error('Error adding book: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'An unexpected error occurred while saving the book.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);

            $reviews=Review::where('book_id',$id)->get();

            $morebooks = Book::whereHas('authors', function ($query) use ($book) {
                $query->whereIn('authors.id', $book->authors->pluck('id'));

            })->where('id', '!=', $book->id)->get();

            return view('book', compact('book', 'morebooks','reviews'));
        } catch (\Exception $e) {
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

        $genres = Genre::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('bookEdit', compact('book', 'genres', 'publishers', 'authors'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $rules = [

            'name' => ['required'],
            'isbn' => ['required'],
            'available_copies' => ['required', 'numeric', 'min:1'],
            'publisherID' => ['required', 'exists:publishers,id'],
            'image' => 'nullable|image|max:2048',
            'authorID' => 'required|array|min:1',
            'authorID.*' => 'exists:authors,id',
            'genreID' => 'nullable|array',
            'genreID.*' => 'exists:genres,id',
            'published_date'=>'required|date|before:today',
            'total_pages'=>['required','numeric', 'min:1'],
            'language'=>'required',

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
            'total_pages.min' => 'The total pages must be at least 1.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors and try again.');
        }

        $pathOfPhoto = $book->image;
        
        if ($request->hasFile('image')) {
            $pathOfPhoto = $request->file('image')->store('uploads/books', 'public');
        }


        $book->update([
            'name' => $request->input('name'),
            'isbn' => $request->input('isbn'),
            'available_copies' => $request->input('available_copies'),
            'publisherID' => $request->input('publisherID'),
            'description' => $request->input('description'),
            'image' => $pathOfPhoto,
            'published_date'=>$request->input('published_date'),
            'total_pages'=>$request->input('total_pages'),
            'language'=>$request->input('language'),

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
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect()->route('allbooklist')->with('book deleted');
        } catch (\Exception $e) {
            return redirect()->route('allbooklist')->with(' error!!, Book was not deleted');
        }
    }



    public function getBooksByGenre( $id)
    {
        try {
           $genre=Genre::findOrFail($id);
            $books = Book::whereHas('genres', function ($query) use ($id) {
                $query->where('genre_Id', $id);
            })->get();

            if (!$books) {
                return redirect()->route('booklist')->with('error', 'No books found for this genre.');
            }

            return view('booklist', compact('books','genre'));

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while fetching the books.');
        }

    }
    public function sortList(Request $request){
        $sortOption = $request->query('sort', 'newest');         
        $books = Book::with(['authors', 'genres', 'publisher']);
        if ($sortOption === 'title') {
            $books->orderBy('name', 'asc');
        } else {
            $books->orderBy('created_at', 'desc');
        }
        $book=$books->paginate(9);
        return view('list', ['books' => $book]);
    }


    public function feature(Book $book){

        $book->update(['featured'=>'yes']);
        return redirect()->back()->with('success','Book has been featured sucessfully');
    }

    public function removeFeature(Book $book){
        $book->update(['featured'=>'no']);
        return redirect()->back()->with('success','Book has been removed from featured sucessfully');
    }

    public function featureList(){
        $totalbook=Book::count();
        $featured=Book::where('featured','yes')->get();
        $totalAuthor=Author::count();
        $totalUser=User::where('role','user')->count();
        $totalBorrow=Borrow::where('request', 'approved')->where( 'status','borrowed')->count(); 
        $books=Book::with(['authors','genres','publisher'])->get();  
        return view('index',compact('featured','totalbook','totalBorrow','totalAuthor','totalUser','books'));
    }

    public function searchList(Request $request){
        $search=$request->input('search');
        $result=Book::where('name','LIKE',"%{$search}%")->orWhere('isbn','LIKE',"%{$search}%")
        ->orWhereHas('authors',function($q)use($search){
            $q->where('name','LIKE',"%{$search}%");
        })
        ->orWhereHas('publisher',function($q)use($search){
            $q->where('name','LIKE',"%{$search}%");
        })
        ->with(['authors','publisher'])
        ->get();
        return view('searchResult',compact('result'));
    }
   

}





