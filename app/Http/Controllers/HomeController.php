<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Lead;
use App\User;
use App\PayLead;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idUser = $request->user()->id;
        $idCompany = $request->user()->company->id;
        $leads = Lead::all();
        $debitUser = $request->user()->find($idUser)->debit->debit;
        $user = $request->user();

        $companyInfo = $request->user()->company;

        return view('dashboard_company', ['leads' => $leads, 'debit' => $debitUser, 'companyInfo' => $companyInfo, 'user' => $user, 'idCompany' => $idCompany]);
    }
}
