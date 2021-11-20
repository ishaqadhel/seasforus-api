<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth0Authentication
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
        $service = \App::make('auth0');
        
        return $next($request);
    }
}
