<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fio','policy','phone','email','login','password','name-company','ogrn','inn','yur-adress','fact-adress','phone-company','fio-boss','description-company','name-bank','bik','k-c','p-c','name-license','date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function debit()
    {
        return $this->hasOne('App\Debit');
    }

    public function updateCompanyInfo($id, $data) {
        $data = array_except($data, '_token');
        $data = array_except($data, 'password_confirmation');

        foreach ($data as $key => $value) {
            $this->where('id', $id)
                ->update([$key => $value]);
        }
    }
}
