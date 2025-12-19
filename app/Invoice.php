<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
    	'company_name',
    	'invoice_number',
    	'user_email',
    	'VAT_number',
    	'name',
    	'surname',
    	'street',
    	'street_number',
    	'city',
    	'ZIPCode',
    	'hour_id',
    	'phone_code',
    	'phone_number'
    ];

	public function country(){
		return $this->hasOne('App\Country','id','country_id');
	}

	public function formatted_price(){
		return number_format(($this->price),2,'.',',');
	}
}
