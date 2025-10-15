<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicTranslation extends Model
{
    use HasFactory;

    protected $table = 'academics_translations';
    public $timestamps = false;
}
