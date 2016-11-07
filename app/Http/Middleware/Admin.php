<?php

namespace App\Http\Middleware;

use Closure,Auth;

class Admin
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
        $response = redirect('login');
        
        if(Auth::check()){
            if (Auth::user()->level == 1 || Auth::user()->level == 3) {
                $response = $next($request);
            }   
        }

        return $response;
        
    }
}
