<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrolledCourse extends Model
{
    use HasFactory;

    protected $fillable = ['status'];
    public function course(){
        return $this->hasOne('App\CatalogCourse','id','catalog_course_id');
    }
}
