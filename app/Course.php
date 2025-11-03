<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','type'];

    public $timestamps = false;

    public function price(){
            return number_format(($this->price/100),2,'.','');
    }

    public function course_type(){
        return $this->hasOne('App\CourseType','id','type');
    }
}
