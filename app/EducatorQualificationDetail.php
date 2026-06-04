<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorQualificationDetail extends Model
{
    use HasFactory;

    protected $fillable = ['educator_id','degree','field_of_study','institution','academic_country','year_of_graduation','gpa'];

    public $timestamps = false;

}
