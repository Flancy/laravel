<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GenerateUrl;
use App\Http\Requests;
use App\User;
use Gate;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $idUser;
     protected $debitUser;

     public function __construct()
     {
         $this->middleware('auth');
         $id = $this->idUser = Auth::user()->id;
         $this->debitUser = User::find($id)->debit->debit;
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

     public function admin(GenerateUrl $urlModel)
     {
         if(Gate::denies('admin')){
             abort(403);
         }
         $urlModel->deleteOldUrl();

         return view('admin', ['debit' => $this->debitUser]);
     }

     public function generateUrlPage(Request $request, GenerateUrl $urlModel)
     {
         $url = $this->generateUrl('/register/');

         $urlModel->addGenerateUrl($url);
         if($urlModel)
         {
             return view('/admin', ['url' => $url, 'debit' => $this->debitUser]);
         }
         else {
             return view('/admin', ['debit' => $this->debitUser]);
         }
     }
}
