<?php

namespace App\Http\Middleware;

use App\Services\AuthenticationService;
use App\Services\JWTService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
            $service = App::make(AuthenticationService::class);
            $jwtService = App::make(JWTService::class);
            if ($service instanceof AuthenticationService && $jwtService instanceof JWTService) {
                $userId = $jwtService->parseUserId($request->bearerToken());
                $user = $service->getUserById($userId);
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
