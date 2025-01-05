<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request,$id)
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

        $review=Review::create([
            'review'=>$request->input('review'),
            'book_id'=>$id,
            'user_id'=>auth()->id()
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reviews=Review::where('book_id',$id)->get();
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
    public function destroy($id)
    {
        $review=Review::findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success','Your comment is deleted');
    }
}
