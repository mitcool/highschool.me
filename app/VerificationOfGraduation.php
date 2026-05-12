<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationOfGraduation extends Model
{
    use HasFactory;

    protected $fillable = ['student_id'];
}
