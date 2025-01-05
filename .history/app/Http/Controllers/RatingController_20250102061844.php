<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$type ,$id)
    {
        try {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
        ]);
        $model = match ($type) {
            'book' => Book::class,
            'author' => Author::class,
            'publisher' => Publisher::class,
            default => null,
        };
        
        if(!$model){
            return response()->json(['error'=>'Invalid type',404]);
        }
        $rateable=$model ::findorFail($id);
        $rating=$rateable->ratings()->updateOrCreate(
            ['user_id'=>auth()->id()],
            ['rating'=>$request->rating]
        );
        return redirect() response()->json(['success' => 'Rating saved', 'rating' => $rating]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'An error occurred: ' . $e->getMessage(),
        ], 500);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
