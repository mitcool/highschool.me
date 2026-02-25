<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrolledCourse extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    /**  */
    const STATUS_ENROLLED  = 0;
    const STATUS_START_STUDY = 1;
    const STATUS_READY_FOR_EXAM = 2;
    const STATUS_EXAM_APPOINTED = 3;
    const STATUS_EXAM_SUBMITED = 4;
    const STATUS_COMPLETED   = 5;
    
    public function course(){
        return $this->hasOne('App\CurriculumCourse','id','catalog_course_id');
    }

    public function student(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function passed_exam(){
        return $this->hasOne('App\Exam','course_id','catalog_course_id')->where('grade','>',1);
    }
}
