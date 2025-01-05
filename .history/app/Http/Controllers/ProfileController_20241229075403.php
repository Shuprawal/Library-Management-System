<?php

namespace App\Http\Controllers;

use App\Models\ProfileDetail;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        if($profile){
            return view('profile',compact('profile'));

        }
        return redirect()->route('profile.')
    }

    /**
     * Display the specified resource.
     */
    public function show( $profileDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileDetail $profileDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileDetail $profileDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileDetail $profileDetails)
    {
        //
    }
}
