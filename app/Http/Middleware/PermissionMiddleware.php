<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if(auth()->user() && auth()->user()->hasPermissionTo($permission)){
            return $next($request);
        }

        abort(403, 'You do not have permission to access this page.');
    }
}