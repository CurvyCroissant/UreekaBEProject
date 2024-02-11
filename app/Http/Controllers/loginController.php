<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('login.index',[
            'title' => 'User Login'
        ]);
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email:dns', 'ends_with:@gmail.com'],
            'password' => ['required', 'string', 'min:6', 'max:12'],
            'phone' => ['required', 'string', 'regex:/^08\d+/'],
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email' => 'This email does not match our records.',
            'phone' => 'This phone number does not match our records.',
        ])->onlyInput('email', 'phone');
        

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
