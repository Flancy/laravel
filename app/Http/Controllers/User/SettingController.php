<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class SettingController extends Controller
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

    public function index(Request $request)
    {
        $data = $request->user();

        $idUser = Auth::user()->id;
        $debitUser = User::find($idUser)->debit->debit;

        return view('user.setting', ['data' => $data, 'debit' => $debitUser]);
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
    public function edit(Request $request, User $user)
    {
        $data = $request->all();
        $idUser = $request->user()->id;

        if ( ! $request->ajax() )
        {
            return redirect()->to('/');
        }

        if (!empty($data['email']))
        {
            $validPersonal = Validator::make($request->all(), [
                'name-company' => 'required|max:255|min:2',
                'fio-boss' => 'required|max:255|min:4',
                'ogrn' => 'required|max:70|min:4',
                'inn' => 'required|max:70|min:4',
                'phone' => 'required|max:70|min:8',
                'email' => 'required|email|max:255|min:6'
            ]);

            if ($validPersonal->fails())
            {
                return $validPersonal->errors()->all();
            }

            return $user->updateCompanyInfo($idUser, $data);
        }

        elseif (!empty($data['password']))
        {
            $validPassword = Validator::make($request->all(), [
                'password' => 'required|confirmed|max:255|min:6',
                'password_confirmation' => 'required|max:255|min:6'
            ]);

            if ($validPassword->fails())
            {
                return $validPassword->errors()->all();
            }
            $data['password'] = bcrypt($data['password']);
            return $user->updateCompanyInfo($idUser, $data);
        }
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
