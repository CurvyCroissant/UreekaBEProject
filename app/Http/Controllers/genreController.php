<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    public function createGenre(){
        return view('createGenre',[
            'title' => 'Create Genre'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Genre::create([
            'name' => $request->name
        ]);

        return redirect('/create-genre');
    }

    public function index(){
        return view('GenresIndex',[
            'title' => 'Genres',
            'genres' => Genre::all()
        ]);
    }
}
