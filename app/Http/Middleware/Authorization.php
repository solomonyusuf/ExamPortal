<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $sess_auth = Cookie::get('sess_auth');
//
//        if(Carbon::parse($sess_auth)->addHour(3) > Carbon::now())
           return $next($request);

        //return redirect()->route('authorize');
    }
}
