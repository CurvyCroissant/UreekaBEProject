<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function createItem()
    {
        return view('createItem', [
            'title' => 'Add New Book',
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|min:1|max:100',
            'isbn' => 'required|string|unique:items',
            'author' => 'required|string|min:1|max:100',
            'publication_year' => 'required|integer|digits:4',
        ]);

        Item::create([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
        ]);

        return redirect('/library');
    }

    public function index()
    {
        $items = Item::all();

        return view('library', [
            'title' => 'Library',
            'items' => $items
        ]);
    }

    public function display(Item $item)
    {

        return view('displayItem', [
            'title' => 'Item Display',
            'item' => $item,
        ]);
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect('/library');
    }

    public function edit(Item $item)
    {
        return view('editItem', [
            'title' => 'Edit Item',
            'item' => $item
        ]);
    }

    public function update(Item $item, Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:1|max:100',
            'isbn' => 'required|string',
            'author' => 'required|string|min:1|max:100',
            'publication_year' => 'required|integer|digits:4',
        ]);

        $item->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
        ]);

        return redirect('/display-item/' . $item->id);
    }
}
