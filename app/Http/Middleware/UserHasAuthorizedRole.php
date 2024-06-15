<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserHasAuthorizedRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$role): Response
    {

        if (!in_array($request->user()->role, $role)) {
            abort(403, 'Whoa! no way. Go back!');
        }

        return $next($request);
    }
}
