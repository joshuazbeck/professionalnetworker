<?php
/*
 * Group 1 Milestone 2
 * MySecurityMiddleware Version 1
 * CST-256
 * 4/24/2021
 * This is Middleware that is being used to block unathorized users from accesssing areas of the site.
 */
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
        // Check request for /admin or users/destroy. Reroute if not admin
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
