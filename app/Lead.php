<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected $fillable = ['fio', 'name-task', 'description', 'summ'];

    public function createLead($data) {
        $data = array_except($data, '_token');

        $this->url = "url";
        $this->fio = $data['fio'];
        $this->name_task = $data['name_task'];
        $this->description = $data['description'];
        $this->summ = $data['summ'];

        $this->save();
    }
}