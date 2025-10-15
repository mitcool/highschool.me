<?php

namespace App\Http\Middleware;

use Closure;

class IpCheck
{
    public function handle($request, Closure $next)
    {
        

        return $next($request);
    }
}
