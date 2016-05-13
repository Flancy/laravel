<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLead extends Model
{
    protected $fillable = [
        'lead_id', 'company_id', 'buy_lead'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function addLeadForCompany($company_id, array $data)
    {
        $this->lead_id = $data['id_lead'];
        $this->company_id = $company_id;
        $this->buy_lead = 1;

        $this->save();
    }
}
