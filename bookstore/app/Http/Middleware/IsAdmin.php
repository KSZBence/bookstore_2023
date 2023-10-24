<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{

    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->permission == 0) {
            return $next($request);
        }
        return redirect('home')->with('error', 'You have not admin access');
    }
}
