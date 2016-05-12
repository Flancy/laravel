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
        'role', 'email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function lead()
    {
        return $this->hasOne('App\Lead');
    }

    public function debit()
    {
        return $this->hasOne('App\Debit');
    }
}
