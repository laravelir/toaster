<?php

namespace Laravelir\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ToasterMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->session->has('toast_success')) {
            toaster('toast', $request->session()->get('toast_success'));
        }

        return $next($request);
    }
}
