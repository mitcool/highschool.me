<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CurriculumType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Categories under this curriculum type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(CourseCategory::class);
    }

    /**
     * Link records in curriculum_courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function curriculumCourses()
    {
        return $this->hasMany(CurriculumCourse::class);
    }

    /**
     * Courses used in this curriculum type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(CatalogCourse::class, 'curriculum_courses', 'curriculum_type_id', 'course_id')
            ->withPivot([
                'id',
                'category_id',
                'required_flag',
                'requirement_text',
                'credits_override',
                'notes',
            ])
            ->withTimestamps(false);
    }
}
