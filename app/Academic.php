<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Academic extends Model
{
    protected $table = 'academics';
    public $timestamps = false;
    
    public function translated(){
        return $this->hasOne('App\AcademicTranslation','academic_id','id')->where('locale',app()->currentLocale());
                     
    }

    public function all_translations(){
        return $this->hasMany('App\AcademicTranslation','academic_id','id');
                     
    }
}
