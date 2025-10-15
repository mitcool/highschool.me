<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramBenefit extends Model
{
    use HasFactory;

    public  $timestams = false;
    protected $fillable = ['benefit','benefit_de','icon','program_id'];

}
