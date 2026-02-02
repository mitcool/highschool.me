<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['date','time','course_id','student_id','educator_id','type','status','grade','comment','pre_exam'];

     protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime'
    ];

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
        $date = Carbon::parse($this->date)->format('Y-m-d').' '.Carbon::parse($this->time)->format('H:i');
        $now = Carbon::now();
        $date = Carbon::parse($date);
        $diff = $date->diffInMinutes($now);
        #dd('start  => '. $now . ' date  => '. $date. 'diff => '.$diff);
        return  $diff < 90;
    }
}
