<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMentor extends Model
{
    use HasFactory;

    public function mentor(){
        return $this->hasOne('App\StudyMentor','id','mentor_id');
    }
}
