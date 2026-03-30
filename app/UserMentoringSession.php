<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMentoringSession extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}

