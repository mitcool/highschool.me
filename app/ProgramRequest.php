<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRequest extends Model
{
    use HasFactory;

    protected $fillable = ['name','last_name','mail','phonecode','phone_number','program_name','how_did_you_find','communication_language'];
}
