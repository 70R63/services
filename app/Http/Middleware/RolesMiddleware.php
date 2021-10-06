<?php

namespace App\Http\Middleware;

use Closure;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        foreach($roles as $rol){
            if(auth()->user()->hasRol($rol)){
                return $next($request);
            }       
        }
        abort(404);
        //return view('customPages.404');
        
    }
}
