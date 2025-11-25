<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CurriculumCourse extends Model
{
    use HasFactory;

    protected $table = 'curriculum_courses';
    public $timestamps = false;

    protected $fillable = [
        'curriculum_type_id',
        'course_id',
        'category_id',
        'required_flag',
        'requirement_text',
        'credits_override',
        'notes',
    ];

    protected $casts = [
        'required_flag'    => 'boolean',
        'credits_override' => 'float',
    ];

    /**
     * Curriculum type to which this link belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curriculumType()
    {
        return $this->belongsTo(CurriculumType::class);
    }

    /**
     * Course referenced by this row.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(CatalogCourse::class, 'course_id');
    }

    /**
     * Optional category for this curriculum-course link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
