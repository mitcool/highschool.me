<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiUser extends Model
{
    use HasFactory;

    protected $connection = 'ai_tool';

    protected $table = 'users';

     protected $fillable = [
        'name', 'email', 'password','tokens'
    ];

}
