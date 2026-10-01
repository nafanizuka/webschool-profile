<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Ensure the authenticated user may access the admin panel.
     * Routes are already behind the "auth" middleware; this only
     * exists so role-based checks can be layered on later without
     * touching every controller.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
