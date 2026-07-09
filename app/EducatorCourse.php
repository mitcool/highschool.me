<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorCourse extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public $timestamps = false;

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }

    public function course(){
        return $this->hasOne('App\CurriculumCourse','id','course_id');
    }

}
