<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorWiseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['wise_account','wise_account_email' ,'wise_option' ,'iban' ,'bic', 'account_number' ,'routing_number' ,'billing_address' ,'educator_id'];

    public $timestamps = false;
}
