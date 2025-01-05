<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use Illuminate\Validation\Rule;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
         return view('publisherlist',compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        return view('addpublisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                Rule::unique('publishers', 'name') // Check for unique names in the 'publishers' table
            ],
            'address' => 'required',
        ];
    
        $messages = [
            'name.regex' => 'The name must not contain special characters or numbers.',
            'name.unique' => 'The publisher name already exists.',
        ];
        
        $validator= Validator::make($request->all(),$rules,$messages);

        if($validator->fails()) {   
            return redirect()->route('publisher.create')->withInput()->withErrors($validator);

        }
        // if (DB::table('publishers')->where('name', $request->name)->exists()) {
        //     $messages['name.unique'] = 'The publisher name already exists.';
        //     $rules['name'] .= '|unique:publishers,name';
        // }

        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();

        return redirect()->route('publisher.index')->with('sucess','New publisher added sucesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{

            $publisher= Publisher::findOrFail($id);

            if ($publisher->books()->exists()) {
                return redirect()->back()->with('error', 'Cannot delete publisher with associated books.');
            }
            $publisher->delete();

            return redirect()->route('publisher.index');
        }catch(\Exception $e){
            return redirect()->route('publisher.index')->with('errorrr');
        }
    }
}
