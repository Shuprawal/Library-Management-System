<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
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
    public function store(Request $request , Book $book)
    {

        $requestHistory=Borrow::where('user_id',auth()->id())->where('book_id',$book->id)->where( 'request','pending')->exists();

        if($requestHistory){
            return redirect()->back()->with('error','Your request is pending');
        }
    
        $history=Borrow::where('user_id',auth()->id())->where('book_id',$book->id)->where( 'status','borrowed')->exists();

        if($history){
            return redirect()->back()->with('error','You have already borrowed this book');
        }
    
        Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'request' => 'pending',
        ]);
    
        return redirect()->back()->with('success', 'Borrow request submitted.');
    }



    // public function store(Request $request , Book $book)
    // {
    
    
    //     Borrow::create([
    //         'user_id' => auth()->id(),
    //         'book_id' => $book->id,
    //         'request' => 'pending',
    //     ]);
    
    //     return redirect()->back()->with('success', 'Borrow request submitted.');
    // }

    /**
     * Display the specified resource.
     */
    // public function show()
    // {
    //     $pendingRequest=Borrow::where('request','pending')->get();
    //     return view('borrowRequest',compact('pendingRequests'));
    // }

    public function show()
{
    $pendingRequests = Borrow::where('request', 'pending')->get(); 
    $acceptedRequests = Borrow::where('request', 'approved')->where( 'status','borrowed')->get(); 
    $returnedBooks = Borrow::where('request', 'approved')->where( 'status','returned')->get(); 
    return view('borrowRequest', compact('pendingRequests','acceptedRequests','returnedBooks'));
}


public function showHistory()
{
    $pendingRequests = Borrow::where('request', 'pending')->where('user_id',auth()->id())->get(); 
    $acceptedRequests = Borrow::where('request', 'approved')->where( 'status','borrowed')->where('user_id',auth()->id())->get(); 
    $returnedBooks = Borrow::where('request', 'approved')->where( 'status','returned')->where('user_id',auth()->id())->get(); 
    return view('borrowHistory', compact('pendingRequests','acceptedRequests','returnedBooks'));
}

    // public function requestAccepted()
    // {

    //     return view('borrowRequest', compact(''));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        $borrow=Borrow::findOrFail($borrow->id);
        
    }

    public function approveRequest(Borrow $borrow)
    {
        $borrow->update(['request' => 'approved', 'borrow_date' => now()]);
        $borrow->book->decreaseCopies(); 

        return redirect()->back()->with('success', 'Borrow request approved.');
    }

    public function returnBook(Borrow $borrow)
    {
        $borrow->update(['status' => 'returned', 'return_date' => now()]);
        $borrow->book->increaseCopies(); 

        return redirect()->back()->with('success', 'Book returned successfully.');
    }

}
