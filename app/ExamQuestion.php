<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    const TYPE_PRE_EXAM = 0;
    const TYPE_FINAL_EXAM = 1;
}
