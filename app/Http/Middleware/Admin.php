<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

class Admin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards) 
    {
        // if (preg_match('/test/', $user->name)) {
        //     return null;
        // }
        
        // return abort(404);

        if (Auth::user() && preg_match('/admin.\w+/', Auth::user()->email)) {
            return $next($request);
        }

        return abort(404);
    }
}
