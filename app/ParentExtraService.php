<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentExtraService extends Model
{
    use HasFactory;

    protected $fillable = ['copies','service_type','student_id'];
}
