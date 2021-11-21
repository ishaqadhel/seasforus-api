<?php

namespace App\Http\Middleware;

use App\Services\AuthenticationService;
use App\Services\JWTService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class Auth0AuthenticationSoft
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
                try {
                    $userId = $jwtService->parseUserId($request->bearerToken());
                    $user = $service->getUserById($userId);
                    $request->request->add(['user' => $user]);
                } catch (\Exception $e) {
                    
                }
            }
            return $next($request);
        } catch (\Exception $e) {
            return response(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
