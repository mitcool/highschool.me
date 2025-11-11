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
}
