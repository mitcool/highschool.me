<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['is_restricted'];

    public $timestamps = false;

    public function languages(){
        return $this->hasMany('App\CountryLanguage');
    }

    public function intro(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasOne('App\CountryIntro','country_id','id')->where('language',$language);
    }

    public function recogniton(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasMany('App\CountryRecognition','country_id','id')->where('language',$language);
    }

     public function steps(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasMany('App\CountryStep','country_id','id')->where('language',$language);
    }

}
