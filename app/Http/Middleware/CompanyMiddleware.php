<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CompanyMiddleware
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
        if(Auth::check()) {
            if ($request->user()->role == 'company') {
                return $next($request);
            }
            elseif($request->user()->role == 'lead') {
                return redirect('/lead/'.$request->user()->id);
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
