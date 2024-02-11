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
            abort(403);
        }

        if(auth()->user()->is_admin != 1)
        {
            abort(403);
        }

        return $next($request);
    }
}
