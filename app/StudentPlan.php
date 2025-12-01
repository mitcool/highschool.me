<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class StudentPlan extends Model
{
    use HasFactory;

    public function plan(){
        return $this->hasOne('App\Plan','id','plan_id');
    }

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function expires_at(){
        return Carbon::parse($this->expires_at)->format('d.m.Y');
    }

    public function is_active(){
         return Carbon::parse($this->expires_at) > Carbon::now();
    }
}
