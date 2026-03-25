<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class Exam extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['datetime','course_id','student_id','educator_id','type','status','grade','comment','pre_exam','passed_at'];

     protected $casts = [
        'datetime' => 'datetime',
        'passed_at'=> 'datetime'
    ];

    const STATUS_APPOINTED = 0;
    const STATUS_SUBMITTED = 1;
    const STATUS_EVALUATED = 2;

    const TYPE_OPEN_EXAM  = 1;
    const TYPE_ESSAY = 2;

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function course(){
        return $this->hasOne('App\CurriculumCourse','id','course_id');
    }

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }

    public function answers(){
        return $this->hasMany('App\User','id','educator_id');
    }

    public function localdate(){
        $dt = new DateTime($this->datetime, new DateTimeZone('UTC'));
        $dt->setTimezone(new DateTimeZone(session('timezone')));
        $response = $dt->format('d.m.Y H:i');
        return $response;
    }

    public function grade(){
        if($this->grade < 1){
            return 'Fail (' .number_format($this->grade,2,'.',',').')';
        }
        elseif($this->grade < 2){
            return 'Pass (' .number_format($this->grade,2,'.',',').')';
        }
        elseif($this->grade < 2.6){
            return 'Satisfactory (' .number_format($this->grade,2,'.',',').')';
        }
        elseif($this->grade < 3.6){
            return 'Good (' .number_format($this->grade,2,'.',',').')';
        }
        elseif($this->grade <= 4){
            return 'Excellent (' .number_format($this->grade,2,'.',',').')';
        }
    }

    public function is_active(){
        $date = Carbon::parse($this->datetime);
        $now = Carbon::now('UTC');
        
        if($this->type == 2){
            $exam_time = 168;
        }
        elseif($this->type == 1 && $this->student->student_details->is_disabled == 1){
            $exam_time = 5;
        }
        else{
            $exam_time = 2;
        }
        
        return $date->subHours($exam_time) < $now;
    }

    public function frauds(){
        return $this->hasMany('App\Fraud','exam_id','id');
    }
}
