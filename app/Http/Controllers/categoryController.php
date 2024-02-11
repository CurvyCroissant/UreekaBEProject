<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function createCategory(){
        return view('createCategory',[
            'title' => 'Create Category'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/categories');
    }

    public function index(){
        return view('CategoriesIndex',[
            'title' => 'Categories',
            'categories' => Category::all()
        ]);
    }
}
