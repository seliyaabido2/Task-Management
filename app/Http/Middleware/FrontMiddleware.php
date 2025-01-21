<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard()->check()) {
            return $next($request);
        } else {
            return redirect('/front/login');
        }
        return $next($request);
    }
}
