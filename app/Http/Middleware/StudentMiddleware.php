<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        header("Access-Control-Allow-Origin: *");
        if(Auth::check()){
            if(auth()->user()->role_id == 2){
                return $next($request);
            }else{
                return response('Unauthorized', 401);
            }
        }
        
        
        return $next($request);
    }
}
