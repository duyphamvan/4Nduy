<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
//            return redirect('/admin');
//        }
//
//        return $next($request);
//    }
}
