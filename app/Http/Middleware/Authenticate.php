<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    // Override
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                // Check user / admin is belong to organization
                if ($guard == 'admin' && isset($request->organization)) {
                    $user = $this->auth->guard($guard)->user();

                    if ($user->organization?->id == $request->organization?->id) {
                        return $this->auth->shouldUse($guard);
                    } else {
                        return $this->unauthenticated($request, $guards);                
                    }
                }

                return $this->auth->shouldUse($guard);
            }
        }

        $this->unauthenticated($request, $guards);
    }

    // Override
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->customRedirectTo($request, $guards)
        );
    }

    private function customRedirectTo(Request $request, array $guards) : string
    {
        $route = route('landing-page');
        $guards = config('auth.guards', []);

        foreach ($guards as $guard => $config) {
            if ($guard == "super-admin") {
                $route = route('super-admin.auth');
                continue;
            } else if ($guard == "admin") {
                $route = route('admin.auth', $request->organization->slug);
                continue;
            }
        }

        return $request->expectsJson() ? null : $route;
    }
}
