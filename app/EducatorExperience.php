<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorExperience extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['company','position','experience_country','from','to','educator_id'];
}
