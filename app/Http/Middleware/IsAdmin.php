<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    
    public function handle(Request $request, Closure $next)
    {
        
        if(auth()->guest())
        {
            return redirect()->route('home');
        }

        if(auth()->user()->is_admin != 1)
        {
            return redirect()->route('library');
        }

        return $next($request);
    }
}
