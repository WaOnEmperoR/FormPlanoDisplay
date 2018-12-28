<?php

namespace App\Http\Middleware;

use Closure;

class IpAccess
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
        $whitelist = ['127.0.0.1'];

        foreach ($whitelist as $item)
        {
            if ($request->ip() == $item)
            {
                return $next($request);
            }    
        }

        return response()->error();        
    }
}
