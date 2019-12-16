<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // checking if user has already logged
        if ($request->session()->has('loggedin') && $request->session()->get('loggedin') == 'true')
        {
            return $next($request); // serve normal
        }
        else
        {
            return redirect('../loginForm'); // login view
        }
    }
}
