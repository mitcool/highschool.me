<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarlyRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['name','middlename','surname','email','education_option','message','country_id'];

    public function fullname(){
        return $this->name.' '.$this->middlename.' '.$this->surname;
    }
    
    public function education_option(){
        if($this->education_option == 1){
            return '24-Credit-Standard/Honors Graduation Track';
        }
        elseif($this->education_option == 2){
            return '18-Credit-ACCEL Graduation Track';
        }
        elseif($this->education_option == 3){
            return 'International Transfer Program';
        }
        elseif($this->education_option == 4){
            return 'Module, Honors & Prep-Courses';
        }
        elseif($this->education_option == 5){
            return 'Learning, Mentoring & Coaching Sessions';
        }
    }

    public function country(){
        return $this->hasOne('App\Country','id','country_id');
        
    }
}
