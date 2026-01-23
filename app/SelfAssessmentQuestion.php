<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessmentQuestion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'material_id',
        'question'
    ];

    public function course()
    {
        return $this->belongsTo(CatalogCourse::class);
    }

    public function answers()
    {
        return $this->hasMany(SelfAssessmentAnswer::class, 'question_id');
    }
}
