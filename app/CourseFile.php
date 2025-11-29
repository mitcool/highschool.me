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
        'original_name',
        'stored_path',
        'mime_type',
        'size',
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
