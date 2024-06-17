<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next, ...$roles)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /* if (Auth::check() && Auth::user()->role_name == 'users') {
        return redirect()->route('login');
        }*/
        if (Auth::check()) {
            $user = Auth::user();
            if (in_array($user->role_name, $roles)) {
                return $next($request);
            }
        }

        return redirect('error-site')->with('error', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');

        // if (Auth::check() && Auth::user()->role_name == 'admin') {
        //    return $next($request);
        // }

        // if (Auth::check() && Auth::user()->role_name == 'users') {
        //     return redirect()->route('home');
        //    // return $next($request);
        // }
        // return $next($request);
    }
}
