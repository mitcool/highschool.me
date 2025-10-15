<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramIsoText extends Model
{
    use HasFactory;

    protected $fillable = ['iso_text','iso_text_de','program_id'];
    public $timestamps = false;
}
