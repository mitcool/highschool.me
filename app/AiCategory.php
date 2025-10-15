<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiCategory extends Model
{
    use HasFactory;

    protected $connection = 'ai_tool';

    protected $table = 'categories';


}

