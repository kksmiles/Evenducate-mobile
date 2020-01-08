<?php

namespace App\Http\Middleware;

use Closure;

class GetRoute
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
        $route = $request->route()->uri;
        return $next($route);
    }
}
