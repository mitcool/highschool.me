<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralRequest extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','subject','request_type','message'];

}
