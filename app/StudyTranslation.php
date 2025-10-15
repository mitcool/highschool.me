<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTranslation extends Model
{
    use HasFactory;

    protected $table = 'study_translations';
    public $timestamps = false;
}
