<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function createItem()
    {
        $categories = Category::all();

        return view('createItem', [
            'title' => 'Create Item',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:5|max:80',
            'category_id' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->name . '-' . $request->category_id . '.' . $extension;
        $request->file('image')->storeAs('public/images', $filename);
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename
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

        $cart = auth()->user()->cart;

        return view('displayItem', [
            'title' => 'Item Display',
            'item' => $item,
            'cart' => $cart,
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
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect('/display-item/' . $item->id);
    }
}
