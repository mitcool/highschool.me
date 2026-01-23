<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessmentAttemptQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'attempt_id',
        'question_id',
        'selected_answer_id',
    ];

    public function attempt()
    {
        return $this->belongsTo(
            SelfAssessmentAttempt::class,
            'attempt_id'
        );
    }

    public function question()
    {
        return $this->belongsTo(
            SelfAssessmentQuestion::class,
            'question_id'
        );
    }

    public function selectedAnswer()
    {
        return $this->belongsTo(
            SelfAssessmentAnswer::class,
            'selected_answer_id'
        );
    }
}
