<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    use HasFactory;

    public function country(){
        return $this->hasOne('App\Country','id','country_id');
    }

    public function language(){
        return $this->hasOne('App\Country','id','language_id');
    }
}
