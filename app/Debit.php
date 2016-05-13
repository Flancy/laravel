<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function takeDebit($summ, $id)
    {
        $debit = $this->where('user_id', $id)->firstOrFail();
        $debit = $debit->debit;
        $summ = $debit - $summ;

        return $this->where('user_id', $id)->update(['debit' => $summ]);
    }
}
