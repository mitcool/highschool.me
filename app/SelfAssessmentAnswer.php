<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessmentAnswer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'question_id',
        'answer',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(SelfAssessmentQuestion::class);
    }
}
