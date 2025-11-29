<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'url',
        'position',
    ];

    /**
     * Parent course (CatalogCourse).
     */
    public function course()
    {
        return $this->belongsTo(CatalogCourse::class, 'course_id');
    }
}
