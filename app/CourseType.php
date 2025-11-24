<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','type'];

    public $timestamps = false;

    public function price(){
            return number_format(($this->price),2,'.',',');
    }
}
