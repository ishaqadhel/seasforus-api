<?php

namespace App\Http\Middleware;

use App\Services\AuthenticationService;
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
        try {
            $service = \App::make(AuthenticationService::class);
            if ($service instanceof AuthenticationService) {
                $user = $service->getUserById(1);
                $request->request->add(['user', $user]);
                return $next($request);
            }
            return response(500);
        } catch (\Exception $e) {
            return response(401)->json([
                "status" => "unathorized"
            ]);
        }
    }
}
