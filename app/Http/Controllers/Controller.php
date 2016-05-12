<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Request;
use Mail;
use App\User;
use App\Lead;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public static function generateUrl($postfix = '/')
    {
        $publicUrl = url('/');
        $randomString = str_random(40);
        return $url = $publicUrl.$postfix.$randomString;
    }

    public function sendEmailReminder($request, $id, $type)
    {
        if($type == 'company')
        {
            $user = User::findOrFail($id);

            Mail::send('emails.company', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, $user->fio)->subject('Your Reminder!');
            });
        }
        elseif($type == 'lead')
        {
            $user = User::findOrFail($id);
            $user = array_add($user, 'pass', $request->pass);

            Mail::send('emails.lead', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, $user->fio)->subject('Your Reminder!');
            });
        }
    }
}
