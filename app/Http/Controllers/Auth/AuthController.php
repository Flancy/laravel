<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\GenerateUrl;
use App\Debit;
use App\Lead;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function lead_index()
     {
         if (Auth::check()) {
             return redirect('/');
         }

         return view('lead.register');
     }

     public function showRegistrationForm(GenerateUrl $urlModel, $url)
     {
         if (property_exists($this, 'registerView')) {
             return view($this->registerView);
         }

         $url = url('/register/').'/'.$url;

         $check = $urlModel->checkUrl($url);

         return view('auth.register', ['url' => $url]);

     }

     public function register(Request $request, Debit $debitModel)
     {
         $validator = $this->validator($request->all());

         if ($validator->fails()) {
             $this->throwValidationException(
                 $request, $validator
             );
         }

         Auth::guard($this->getGuard())->login($this->create($request->all()));

         $debitModel->user_id = Auth::user()->id;
         $debitModel->save();

         $this->sendEmailReminder($request, Auth::user()->id, 'company');

         return redirect($this->redirectPath());
     }

     public function lead_register(Request $request, Lead $leadModel)
     {
         $valid = Validator::make($request->all(), [
             'fio' => 'required|max:255|min:4',
             'email' => 'required|email|max:255|min:6|unique:leads',
             'name_task' => 'required|max:70|min:4',
             'description' => 'required|min:4',
             'summ' => 'required|max:70|min:3'
         ]);

         if ($valid->fails())
         {
             $errors = $valid->errors()->all();
             return redirect()->back()->withErrors($valid->errors());
         }

         $str = str_random(8);
         $password = bcrypt($str);
         $request = array_add($request, 'password', $password);
         $request = array_add($request, 'policy', 'lead');
         $request = array_add($request, 'pass', $str);

         $leadModel->createLead($request->all());

         $this->sendEmailReminder($request, $leadModel->id, 'lead');

         return redirect('/');
     }

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'fio' => 'required|max:255|min:10',
             'phone' => 'required|max:24|min:4',
             'email' => 'required|email|max:255|min:6|unique:users',
             'login' => 'required|max:64|min:4|unique:users',
             'password' => 'required|min:6',
             'name-company' => 'required|max:64',
             'ogrn' => 'required|max:128',
             'inn' => 'required|max:128',
             'yur-adress' => 'required|max:1024',
             'fact-adress' => 'required|max:1024',
             'phone-company' => 'required|max:24|min:4',
             'fio-boss' => 'required|max:255',
             'description-company' => 'required|max:246',
             'name-bank' => 'required|max:64',
             'bik' => 'required|max:128',
             'k-c' => 'required|max:64',
             'p-c' => 'required|max:64',
             'name-license' => 'required|max:128',
             'date' => 'required|max:64'
         ]);
     }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        GenerateUrl::deleteUrl($data['url']);
        return User::create([
            'fio' => $data['fio'],
            'policy' => 'company',
            'phone' => $data['phone'],
            'email' => $data['email'],
            'login' => $data['login'],
            'password' => bcrypt($data['password']),
            'name-company' => $data['name-company'],
            'ogrn' => $data['ogrn'],
            'inn' => $data['inn'],
            'yur-adress' => $data['yur-adress'],
            'fact-adress' => $data['fact-adress'],
            'phone-company' => $data['phone-company'],
            'fio-boss' => $data['fio-boss'],
            'description-company' => $data['description-company'],
            'name-bank' => $data['name-bank'],
            'bik' => $data['bik'],
            'k-c' => $data['k-c'],
            'p-c' => $data['p-c'],
            'name-license' => $data['name-license'],
            'date' => $data['date'],
        ]);
    }

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'login';
    }
}
