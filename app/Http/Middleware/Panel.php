<?php

namespace PruebaHotel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Panel
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
        
        if (!Auth::check()) {
            return redirect('/iniciar-sesion');
        }

        return $next($request);
    }
}
