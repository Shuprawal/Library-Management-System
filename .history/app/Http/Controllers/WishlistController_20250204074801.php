<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
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
    public function store(Request $request, $id)
    {
        $existList=Wishlist::where('book_id',$id)->where('user_id',auth()->id())->exists();
        if($existList){
            return redirect()->back()->with('error','This book already exists in your wishlist');
        }
        $wishlist=Wishlist::create([
            'book_id'=>$id,
            'user_id'=>auth()->id()
        ]);
        return redirect()->back()->with('success','Added to wishlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        $wishlists=Wishlist::where('user_id',auth()->id())->orderBy('created_at','');
        return view('wishlist',compact('wishlists'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wishlist=Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('success','Book is removed from your wishlist');
    }
}
