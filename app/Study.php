<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $table = 'studies';
    public $timestamps = false;

    public function programs(){

        return $this->hasMany('App\Program','study_id','id');
    }
    public function translated(){
        return $this->hasOne('App\StudyTranslation','study_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\StudyTranslation','study_id','id');
    }

    public function studies_periods(){
        return $this->hasMany('App\StudyPeriod','study_id','id');
    }
   
}
