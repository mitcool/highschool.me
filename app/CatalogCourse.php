<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CatalogCourse extends Model
{
    use HasFactory;

    protected $table = 'catalog_courses';
    public $timestamps = false;

    protected $fillable = [
        'fldoe_course_code',
        'course_number',
        'title',
        'default_credits',
    ];

    protected $casts = [
        'default_credits' => 'float',
    ];

    /**
     * All curriculum-course links for this course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function curriculumCourses()
    {
        return $this->hasMany(CurriculumCourse::class, 'course_id');
    }

    /**
     * All curriculum types that use this course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function curriculumTypes()
    {
        return $this->belongsToMany(CurriculumType::class, 'curriculum_courses', 'course_id', 'curriculum_type_id')
            ->withPivot([
                'id',
                'category_id',
                'required_flag',
                'requirement_text',
                'notes',
            ])
            ->withTimestamps(false);
    }

    /**
     * AP details (if this course is an AP course).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function apDetail()
    {
        return $this->hasOne(ApDetail::class, 'course_id');
    }

    /**
     * CLEP details (if this course has a CLEP mapping).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clepDetail()
    {
        return $this->hasOne(ClepDetail::class, 'course_id');
    }

    /**
     * ESOL details (if this course is in the ESOL curriculum).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function esolDetail()
    {
        return $this->hasOne(EsolDetail::class, 'course_id');
    }

    /**
     * Attached files for this course.
     */
    public function files()
    {
        return $this->hasMany(CourseFile::class, 'course_id')
            ->orderBy('position')->orderBy('id');
    }

    /**
     * Video links for this course.
     */
    public function videos()
    {
        return $this->hasMany(CourseVideo::class, 'course_id')
            ->orderBy('position')->orderBy('id');
    }
}
