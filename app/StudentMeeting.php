<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMeeting extends Model
{
    use HasFactory;

    public function hour(){
        return $this->hasOne('App\EducatorHour','id','educator_hour_id');
    }

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }
}
