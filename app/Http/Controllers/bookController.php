<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function createBook(){
        $genres = Genre::all();

        return view('createBook', [
            'title' => 'Create Item',
            'genres' => $genres
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|min:5|max:80',
            'genre_id' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->name.'-'.$request->genre_id.'.'.$extension;
        $request->file('image')->storeAs('public/images', $filename);
        Book::create([
            'name' => $request->name,
            'genre_id' => $request->genre_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename
        ]);

        return redirect('/library');
    }

    public function index(){
        $books = Book::all();

        return view('library', [
            'title' => 'Library',
            'books' => $books
        ]);
    }

    public function display(Book $book){
        // $book = Book::findOrFail($id);
        return view('displayBook', [
            'title' => 'Item Display',
            'book' => $book           
        ]);
    }

    public function delete(Book $book){
        $book->delete();
        return redirect('/library');
    }

    public function edit(Book $book){
        return view('editBook', [
            'title' => 'Edit Item',
            'book' => $book
        ]);
    }

    public function update(Book $book, Request $request){
        $request->validate([
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $book->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect('/display-item/' . $book->id);
    }
}


