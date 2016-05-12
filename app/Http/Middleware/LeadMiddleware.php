<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LeadMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()) {
            if ($request->user()->role == 'lead') {
                return $next($request);
            }
            elseif($request->user()->role == 'company') {
                return redirect('/home');
            }
            elseif($request->user()->role == 'admin') {
                return $next($request);
            }
            else {
                return redirect ('/');
            }
        }
        else {
            return redirect ('/');
        }
    }
}
