<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Auth0\Login\Contract\Auth0UserRepository;

class Auth0Controller extends Controller
{
    public function __construct(Auth0UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login() {
        return App::make('auth0')->login(
            null,
            null,
            ['scope' => 'openid name email profile email_verified'],
            'code'
        );
    }

    public function callback() {
        $service = \App::make('auth0');

        // Try to get the user information
        $profile = $service->getUser();

        // Get the user related to the profile
        $auth0User = $profile ? $this->userRepository->getUserByUserInfo($profile) : null;

        if ($auth0User) {
            // If we have a user, we are going to log them in, but if
            // there is an onLogin defined we need to allow the Laravel developer
            // to implement the user as they want an also let them store it.
            if ($service->hasOnLogin()) {
                $user = $service->callOnLogin($auth0User);
            } else {
                // If not, the user will be fine
                $user = $auth0User;
            }

            \Auth::login($user, $service->rememberUser());
            dd($user);
        }
    }

    public function info() {
        
        $user = Auth::user();
        dd(Auth::user()->getUserInfo());
    }

    public function logout() {
        Auth::logout();

        $logoutUrl = sprintf(
            'https://%s/v2/logout?client_id=%s&returnTo=%s',
            config('laravel-auth0.domain'),
            config('laravel-auth0.client_id'),
            config('app.url')
        );

        return Redirect::intended($logoutUrl);
    }
}