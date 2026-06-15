<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleExamQuestion extends Model
{
    use HasFactory;

    public function exam_question(){
        return $this->hasOne('App\ExamQuestion','id','question_id');
    }
}
