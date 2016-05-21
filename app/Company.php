<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id', 'fio', 'phone', 'name_company', 'ogrn', 'inn', 'yur_adress', 'fact_adress', 'phone_company', 'fio_boss', 'description_company', 'name_bank', 'bik', 'k_c', 'p_c', 'name_license', 'date_license'
    ];
    public function debit()
    {
        return $this->belongsTo('App\Debit');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payLead()
    {
        return $this->hasMany('App\PayLead', 'company_id', 'id');
    }

    public function createCompany(array $data, $id)
    {
        $this->user_id = $id;
        $this->fio = $data['fio'];
        $this->phone = $data['phone'];
        $this->name_company = $data['name-company'];
        $this->ogrn = $data['ogrn'];
        $this->inn = $data['inn'];
        $this->yur_adress = $data['yur-adress'];
        $this->fact_adress = $data['fact-adress'];
        $this->phone_company = $data['phone-company'];
        $this->fio_boss = $data['fio-boss'];
        $this->description_company = $data['description-company'];
        $this->name_bank = $data['name-bank'];
        $this->bik = $data['bik'];
        $this->k_c = $data['k-c'];
        $this->p_c = $data['p-c'];
        $this->name_license = $data['name-license'];
        $this->date_license = $data['date'];

        return $this->save();
    }

    public function updateCompanyInfo($id, $data)
    {
        $data = array_except($data, '_token');
        $data = array_except($data, 'password_confirmation');

        foreach ($data as $key => $value) {
            $this->where('id', $id)
                ->update([$key => $value]);
        }
    }
}
