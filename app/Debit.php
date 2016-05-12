<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
