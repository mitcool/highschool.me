<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorCategory extends Model
{
    use HasFactory;

    protected $fillable = ['status'];
    
    public $timestamps = false;

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }

    public function category(){
        return $this->hasOne('App\CourseCategory','id','category_id');
    }
}
