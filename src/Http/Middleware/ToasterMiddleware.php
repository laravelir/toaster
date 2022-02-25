<?php

namespace Laravelir\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ToasterMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
