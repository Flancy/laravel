<?php

namespace App\Http\Controllers\Lead;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Lead;
use App\PayLead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('lead.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Lead $leadModel)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function showLeadCart(Request $request, Lead $leadModel, $id)
     {
         $url = url('/lead/').'/'.$id;
         $user = Lead::find($id);

         return view('lead.dashboard', ['leadInfo' => $user]);
     }

     public function showLeadInfo(Request $request, $id)
     {
         if ( ! $request->ajax() )
         {
             return redirect('/');
         }

         $payLead = PayLead::where('lead_id', '=', $id)->where('company_id', '=', $request->user()->company->id)->where('buy_lead', 1)->count();
         if($payLead === 1) {
             $leadInfo = Lead::find($id);
             return view('ajax.lead-info', ['leadInfo' => $leadInfo]);
         }

         else {
             $error = 'Произошла ошибка. Перезагрузите страницу и попробуйте еще раз';
             return view('ajax.lead-info', ['error' => $error]);
         }
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
