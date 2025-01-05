<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
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
    public function store(Request $request ,$id)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books, $id',
        ]);
    
        Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $validated['book_id'],
            'request' => 'pending',
        ]);
    
        return redirect()->back()->with('success', 'Borrow request submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

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
        //
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
