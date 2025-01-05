<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\New;
use Illuminate\Validation\Rule;

class NewController extends Controller
{
    function addBook(Request $request){
        $pathOfPhoto= null;
    
        if ($request->hasFile('book_image')) {
            $pathOfPhoto = $request->file('book_image')->store('uploads/books', 'public');
        }
        $addBooks= new New();
        $addBooks->name = $request->name;
        $addBooks->isbn= $request->isbn;
        $addBooks->publisher_id=$request->book_publisher;
        $addBooks->genre=$request->genre;
        $addBooks->author_id=$request->book_author;
        $addBooks->status=$request->yesNo;
        $addBooks->photo=$pathOfPhoto;
        $addBooks->save();
         // Redirect back with a success message
         return redirect()->back();
}
    // }
   