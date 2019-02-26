<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string[null] $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)

    {
        if(Auth('vendor')->user())  
        {
            
             return $next($request);
        }
        
        return redirect( '/login/vendor' );

    }
}
