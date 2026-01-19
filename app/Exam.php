<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['date','time','course_id','student_id','educator_id','type','status','grade','comment'];

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
}
