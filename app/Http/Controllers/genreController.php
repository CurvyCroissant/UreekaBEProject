<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    public function createGenre(){
        return view('createGenre',[
            'title' => 'Create Category'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string'
        ]);

        Genre::create([
            'name' => $request->name
        ]);

        return redirect('/categories');
    }

    public function index(){
        return view('GenresIndex',[
            'title' => 'Categories',
            'genres' => Genre::all()
        ]);
    }
}
