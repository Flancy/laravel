<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'fio','name_task', 'description', 'price'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function createLead($data, $id) {
        $data = array_except($data, '_token');

        $this->user_id = $id;
        $this->fio = $data['fio'];
        $this->name_task = $data['name_task'];
        $this->description = $data['description'];
        $this->price = $data['price'];

        return $this->save();
    }
}
