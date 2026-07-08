<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user() || !in_array($request->user()->rol, $roles)) {
            // Check if there is a previous url, otherwise redirect to dashboard
            $previous = url()->previous();
            if ($previous == url()->current()) {
                $previous = route('dashboard');
            }
            return redirect($previous)->with('forbidden_error', 'No tenés permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}