<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CteCourseProgram extends Model
{
    use HasFactory;

    public function course(){
          return $this->belongsTo(CatalogCourse::class, 'course_id');
    }

    public function program(){
          return $this->belongsTo(CteProgram::class, 'program_id');
    }
}
