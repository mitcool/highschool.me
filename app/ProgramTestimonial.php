<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTestimonial extends Model
{
    use HasFactory;

    protected $fillable = ['text','text_de','program_id','video'];
    public $timestamps = false;

}
