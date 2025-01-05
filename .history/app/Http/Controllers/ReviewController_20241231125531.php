<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'review'=> 'required',
        ];
        $messages=[
            'review.required'=>'Comments cannot be empty'
        ];
        $validator=Validator::make($request->all(), $rules,$messages);
        if($validator->fails()){
            return redirect()->back()->with('error','Error occured');
        }
        $review->create([
            'review'->$request->input('review'),
            'book_id'->$book-
        ])
    }

    /**
     * Display the specified resource.
     */
    public function show($book)
    {
        $review=Review::where('book_id',$book->id);
        return view('book',compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
