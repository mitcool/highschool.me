<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Conference extends Model
{
    protected $table = 'conferences';
    public $timestamps = false;

    public function deadlineIsPassed(){
    	$now = Carbon::now()->timestamp;
    	$deadline = Carbon::parse($this->application_deadline)->timestamp;
  
   		if($now>$deadline){
   			return true;
   		}
   		else{
   			return false;
   		}
    }

	public function translated(){
		return $this->hasOne('App\ConferenceTranslation','conference_id','id')->where('locale',app()->currentLocale());
	}

	public function all_translations(){
        return $this->hasMany('App\ConferenceTranslation','conference_id','id');
    }
	
	public function formated_date_to(){

		return Carbon::parse($this->date_to)->format('d.m.Y');
	}
	public function formated_date_from(){

		return Carbon::parse($this->date_from)->format('d.m.Y');
	}
	
	public function formated_deadline(){

		return Carbon::parse($this->application_deadline)->format('d.m.Y');
	}

}
