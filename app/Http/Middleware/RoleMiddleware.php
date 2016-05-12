<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
            if($request->user()->role == 'lead') {
                return redirect ('/lead/'.$request->user()->id);
            }
            elseif($request->user()->role == 'company') {
                return redirect ('/home');
            }
            elseif($request->user()->role == 'admin') {
                return redirect ('/home');
            }
            else {
                return redirect('/login');
            }
        }
        else {
            return redirect('/login');
        }
    }
}
