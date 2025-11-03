<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }
}
