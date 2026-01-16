<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['date','time','course_id','student_id','educator_id'];

     protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime'
    ];
}
