<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['exam_id', 'question_id', 'answer'];

    public function exam(){
        return $this->hasOne('App\Exam', 'id', 'exam_id');
    }

    public function question(){
        return $this->hasOne('App\ExamQuestion', 'id', 'question_id');
    }
}
