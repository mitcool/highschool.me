<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CteJob extends Model
{
    protected $table = 'cte_jobs';
    public $timestamps = false;

    protected $fillable = ['code', 'name'];

    public function curriculumCourses()
    {
        return $this->hasMany(CurriculumCourse::class, 'job_id');
    }
}

