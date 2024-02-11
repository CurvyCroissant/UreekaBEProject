<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(){
        return view('register.index',[
            'title' => 'New User Registration'
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|string|email:dns|ends_with:@gmail.com',
            'password' => 'required|string|min:6|max:12',
            'phone' => 'required|string|regex:/^08\d+/',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
