<?php
/*
 * Group 1 Milestone 2
 * MySecurityMiddleware Version 1
 * CST-256
 * 4/24/2021
 * This is Middleware that is being used to block unauthorized users from accessing areas of the site.
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
        // Check request for logged in user. Restrict to index, login, and register.
        if (!$request->is("/") && !$request->is('login') && !$request->is('register') && !$request->is('dologin') && !$request->is('users') && !$request->is('users/create') && session("loggedIn") != true)
        {
            return redirect('/');
        }
        // Check request for /admin or users/destroy. Reroute if not admin
        elseif(($request->is('admin') || $request->is('users/destroy')) && session('userRole') != 3)
        {
            return redirect('/');
        }
        else
        {
            return $next($request);
        }

    }
}
