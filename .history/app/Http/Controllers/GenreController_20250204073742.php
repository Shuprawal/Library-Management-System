<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $genres = Genre::all();
        return view('genrelist', compact('genres'));
       
  
    }
    public function try()
    {
        $genres = Genre::paginate(8)->where('created_at','');
        return view('genrelist', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('addgenre');
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
            Rule::unique('genres', 'name')
        ]
    ];

    $messages = [
        'name.regex' => 'The name must not contain special characters or numbers.',
        'name.unique' => 'Genre already exists.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->route('genre.create')->withInput()->withErrors($validator);
    }

    Genre::create(['name' => $request->name]);

    return redirect()->route('genre.index')->with('success', 'New genre added successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre=Genre::findOrFail($id);
        return view('genreEdit',[
            'genre'=>$genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $genre=Genre::findOrFail($id);
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                Rule::unique('genres', 'name')->ignore($genre->id)
            ]
        ];
    
        $messages = [
            'name.regex' => 'The name must not contain special characters or numbers.',
            'name.unique' => 'Genre already exists.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        //Genre::create(['name' => $request->name]);
        $genre->name = $request->name;
        $genre->save();
    
        return redirect()->route('genre.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $genre=Genre::findOrFail($id);
            if ($genre->books()->exists()) {
                return redirect()->back()->with('error', 'Cannot delete genre with associated books.');
            }  
            $genre->delete();
            return redirect()->route('genre.index');

        }catch(\Exception $e){
            return redirect()->route('genre.index')->with('error while deleting genre');
        }
    }
}
