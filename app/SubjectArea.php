<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubjectArea extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    /**
     * Categories belonging to this subject area.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseCategories()
    {
        return $this->hasMany(CourseCategory::class);
    }
}
