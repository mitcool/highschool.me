<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CteProgram extends Model
{
    protected $table = 'cte_programs';
    public $timestamps = false;

    protected $fillable = ['cluster_id', 'category_id', 'program_number', 'program_title'];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function curriculumCourses()
    {
        return $this->hasMany(CurriculumCourse::class, 'program_id');
    }
}
