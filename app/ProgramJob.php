<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramJob extends Model
{
    use HasFactory;

    public function job(){
        return $this->hasOne('App\Job','id','job_id');
    }

    public function program(){
        return $this->hasOne('App\Program','id','program_id');
    }
}
