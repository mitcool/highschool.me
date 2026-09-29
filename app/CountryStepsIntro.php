<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryStepsIntro extends Model
{
    use HasFactory;

    protected $fillable = ['text','language','country_id'];

    public $timestamps = false;
}
