<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMentor extends Model
{
    use HasFactory;

    public function course_mentor(){
        return $this->hasOne('App\CourseMentor','mentor_id','id');
    }
}
