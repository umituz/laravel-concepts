<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class CORS
 * @package App\Http\Middleware
 */
class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-type, X-Auth-Token, Authorization, Origin');
        return $next($request);
    }
}
