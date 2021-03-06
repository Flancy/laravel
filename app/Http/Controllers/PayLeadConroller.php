<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use App\PayLead;
use App\Debit;

class PayLeadConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PayLead $payLeadModel, Debit $debitModel)
    {
        $data = $request->all();
        $idUser = $request->user()->company->id;
        $summ = 100;
        if ( ! $request->ajax() )
        {
            return redirect()->to('/');
        }

        if (!empty($data['id_lead']))
        {
            $payLeadModel->addLeadForCompany($idUser, $data);
            return $debitModel->takeDebit($summ, $idUser);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, PayLead $payLeadModel)
    {
        $previousUrl = url()->previous();
        $previousUrl = explode('/', $previousUrl);
        $idLead = array_pop($previousUrl);

        $idCompany = $request->user()->company->id;
        $name_company = $request->user()->company->name_company;

        $valid = Validator::make($request->all(), [
            'timeline' => 'required|max:255|min:1',
            'price' => 'required|min:4|numeric',
            'description_done' => 'required|string|min:4',
            'unic_bid' => 'required|string|min:4'
        ]);

        if ($valid->fails())
        {
            return $valid->errors()->all();
        }

        $data = $request->all();

        $data = array_add($data, 'idCompany', $idCompany);
        $data = array_add($data, 'name_company', $name_company);

        $payLeadModel->addCompanyBid($idLead, $data);

        return redirect()->back();
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
