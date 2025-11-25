<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'curriculum_type_id',
        'subject_area_id',
        'name',
    ];

    /**
     * Curriculum type this category belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curriculumType()
    {
        return $this->belongsTo(CurriculumType::class);
    }

    /**
     * Subject area this category belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subjectArea()
    {
        return $this->belongsTo(SubjectArea::class);
    }

    /**
     * Curriculum-course links (rows in curriculum_courses) under this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function curriculumCourses()
    {
        return $this->hasMany(CurriculumCourse::class, 'category_id');
    }
}
