<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareProfilAssistant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->profil == 'Admin' || Auth::user()->profil == 'superAdmin' || Auth::user()->profil == 'Assistant(e)') {
            return $next($request);
        }
        abort(403);
    }
}
