<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['city','street','street_number','zip','user_id','country_id','phone'];

    public $timestamps = false;

    public function country(){
        return $this->hasOne('App\Country','id','country_id');
    }
}
