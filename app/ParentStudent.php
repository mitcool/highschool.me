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

    protected $fillable = ['status','expired_at','is_disabled','grade','parent_id','student_id','track','feedback','tokens','gender','student_location_id','ethnicity_id'];

    //STATUSES
    const CREATED = 0;
    const PAID_APPLICATION_FEE = 1;
    const DOCUMENTS_APPROVED = 2;
    const ACTIVE = 3;
    const GRADUATED = 4;

    public function status_name(){
        $status_name = '';
        if($this->status == 0){
            $status_name = 'No uploaded documents';
        }
        elseif($this->status == 1){
            $status_name = 'Application fee paid';           
        }
        elseif($this->status == 2){
            $status_name = 'Approved documents';            
        }
        elseif($this->status == 3){
            $status_name = 'Enrollment fee paid (Active student)';           
        }
        return $status_name;
    }

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }

    public function student_location()
    {
        return $this->belongsTo('App\StudentLocation', 'student_location_id', 'id');
    }

    public function ethnicity()
    {
        return $this->belongsTo('App\Ethnicity', 'ethnicity_id', 'id');
    }

    public function approved_documents_count(){
        return StudentDocument::where('type','<',8)->where('student_id',$this->student_id)->where('is_approved',1)->count();
    }

     public function rejected_documents_count(){
        return StudentDocument::where('type','<',8)->where('student_id',$this->student_id)->where('is_approved',2)->count();
    }
    
    public function plans(){
        return $this->hasMany('App\StudentPlan','student_id','student_id');
    }

    public function track_name(){
        if($this->track == 1){
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
