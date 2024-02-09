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
            'title' => 'Create Book',
            'genres' => $genres
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:5|max:80',
            'genre_id' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->title.'-'.$request->genre_id.'.'.$extension;
        $request->file('image')->storeAs('/public/book_images', $filename);
        Book::create([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'author' => $request->author,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect('/');
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
            'title' => 'Book Display',
            'book' => $book           
        ]);
    }

    public function delete(Book $book){
        $book->delete();
        return redirect('/library');
    }

    public function edit(Book $book){
        return view('editBook', [
            'title' => 'Edit Book',
            'book' => $book
        ]);
    }

    public function update(Book $book, Request $request){
        $request->validate([
            'title' => 'required|min:5|max:80',
            'author' => 'required',
            'description' => 'required'
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description
        ]);

        return redirect('/library');
    }
}


