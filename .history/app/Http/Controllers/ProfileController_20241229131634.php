<?php

namespace App\Http\Controllers;

use App\Models\ProfileDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addProfile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'address'=>'required',
            'contact_number'=>'required|max:15',
            'date_of_birth'=>'required|date|before:today',
        ];
        $messages=[
            'address.required' => 'The Address field is mandatory.',
            'contact_number.required' => 'The Contact Number field is mandatory.',
            
        ];

        $validator = $request->validate($rules, $messages);
        $user = auth()->user();
        $user->profile()->create($validator);

    return redirect()->back()->with('success', 'Profile created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        $profile = $user->profile;
        if($profile){
            return view('profile',compact('profile'));

        }
        return redirect()->route('profilecreate');
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