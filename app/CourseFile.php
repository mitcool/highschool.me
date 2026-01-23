<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'label',
        'stored_path',
    ];

    /**
     * Parent course (CatalogCourse).
     */
    public function course()
    {
        return $this->belongsTo(CatalogCourse::class, 'course_id');
    }

    public function selfAssessmentQuestions()
{
    return $this->hasMany(SelfAssessmentQuestion::class, 'material_id');
}
}
