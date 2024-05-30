<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // List of routes that should be accessible without authentication
        $accessibleRoutes = [
            'landing-page',
            'register',
            'login',
            'register.submit',
            'login.submit'
        ];

        if (!auth()->check() && !$request->is($accessibleRoutes)) {
            return redirect()->route('landing-page');
        } elseif (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }


}
// I will be coming back to this in the future
