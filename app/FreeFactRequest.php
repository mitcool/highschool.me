<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeFactRequest extends Model
{
    use HasFactory;

    protected $fillable = ["gender" ,"firstname","surname","email" ,"phone" , "phonecode" ,"program","communication_language"];
}
