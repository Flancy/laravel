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

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public static function generateUrl($postfix = '/')
    {
        $publicUrl = url('/');
        $randomString = str_random(40);
        return $url = $publicUrl.$postfix.$randomString;
    }

    public function sendEmailReminder($request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->fio)->subject('Your Reminder!');
        });
    }
}
