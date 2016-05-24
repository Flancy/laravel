<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLead extends Model
{
    protected $fillable = [
        'lead_id', 'company_id', 'buy_lead', 'timeline', 'price', 'description_done', 'unic_bid'
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

    public function addCompanyBid($idLead, array $data)
    {
        PayLead::where('lead_id', $idLead)
            ->where('company_id', $data['idCompany'])
            ->where('buy_lead', 1)
            ->update([
                'name_company' => $data['name_company'],
                'timeline' => $data['timeline'],
                'price' => $data['price'],
                'description_done' => $data['description_done'],
                'unic_bid' => $data['unic_bid']

            ]);
    }
}
