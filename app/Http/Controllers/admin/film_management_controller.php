<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\movie;
use Illuminate\Http\Request;

class film_management_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = movie::all();
        // dd($movies);
        return view('admin.index', ['movie'=>$movies]);
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
        $movies= $request->except("_token");
        $image = $request->file('image'); 
        $storedPath = $image->move('uploads', $image->getClientOriginalName());
        $movies['image'] = $image->getClientOriginalName();
        movie::create($movies);
        return redirect()->route('admin.movie.index') -> with('success', 'Thành Công');
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
    public function edit(int $id)
    {
        // $movies = movie::find($id);
        // return view('admin.index');
        
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
    public function destroy(int $id)
    {
        $movies = movie::find($id);
        if (file_exists(public_path('uploads/' . $movies->image))){
            unlink(public_path('uploads/' . $movies->image));
        }
        $movies -> delete();

        return redirect()->route('admin.movie.index') -> with('success', 'Thành Công');
    }
}
