<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLead extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'pay_leads';
}