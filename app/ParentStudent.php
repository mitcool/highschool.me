<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\StudentDocument;

class ParentStudent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['status','expired_at','is_disabled','grade','parent_id','student_id','track'];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }

    public function approved_documents_count(){
        return StudentDocument::where('type','<',7)->where('student_id',$this->student_id)->where('is_approved',1)->count();
    }

     public function rejected_documents_count(){
        return StudentDocument::where('type','<',7)->where('student_id',$this->student_id)->where('is_approved',2)->count();
    }
    
    public function plans(){
        return $this->hasMany('App\StudentPlan','student_id','student_id');
    }

    public function track_name(){
        if($this->track = 1){
           return '24-Credit-Graduation Standard Track';             
        }
        elseif($this->track==2){
            return '18-Credit-ACCEL Graduation Track';
        }
        elseif($this->track==3){
            return 'Credit Transfer Track';
        }
    }
}
