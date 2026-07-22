<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMentor extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','mentor_id','video','description'];

    public $timestamps = false;

    public function mentor(){
        return $this->hasOne('App\StudyMentor','id','mentor_id');
    }

    public function course(){
         return $this->hasOne('App\CurriculumCourse','id','course_id');
    }
}
