<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check() ) {
            return redirect()->route('login');
        }

       /* if (Auth::check() && Auth::user()->role_name == 'users') {
            return redirect()->route('login');
        }*/


        if (Auth::check() && Auth::user()->role_name == 'admin') {
           return $next($request);
        }

        if (Auth::check() && Auth::user()->role_name == 'users') {
            return redirect()->route('home');
           // return $next($request);
        }
        // return $next($request);
    }
}
