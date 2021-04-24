<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MySecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(($request->is('admin') || $request->is('users/destroy')) && session('userRole') != 3)
        {
            return redirect('/');
        }
        else
        {
            return $next($request);
        }

    }
}
