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

    public function diploma(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasOne('App\CountryDiploma','country_id','id')->where('language',$language);
    }

     public function steps(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasMany('App\CountryStep','country_id','id')->where('language',$language);
    }

    public function steps_intro(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasOne('App\CountryStepsIntro','country_id','id')->where('language',$language);
    }

    public function inside(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasMany('App\CountryInside','country_id','id')->where('language',$language);
    }

    public function faqs(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasMany('App\CountryFaq','country_id','id')->where('language',$language);
    }

    public function sources(){
        $language = request()->segment(2);
        if(strlen($language) != 2){
            $language = 'en';
        }
        return $this->hasOne('App\CountrySource','country_id','id')->where('language',$language);
    }

}
