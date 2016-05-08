<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['fio', 'name-task', 'description', 'summ'];

    public function createLead($data, $url) {
        $data = array_except($data, '_token');

        $this->url = $url;
        $this->fio = $data['fio'];
        $this->email = $data['email'];
        $this->name_task = $data['name_task'];
        $this->description = $data['description'];
        $this->summ = $data['summ'];

        $this->save();
    }
}
