<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\PayLead;

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
                $id = $request->user()->company->id;
                $lead_id = $request->id;
                settype($lead_id, "integer");
                $object = PayLead::where('lead_id', '=', $lead_id)->where('company_id', '=', $id)->where('buy_lead', 1)->count();
                if($object === 1) {
                    return $next($request);
                }
                else {
                    return redirect('/home');
                }
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
