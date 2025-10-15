<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramJobCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne('App\JobCategory','id','category_id');
    }

    public function program(){
        return $this->hasOne('App\Program','id','program_id');
    }

    public function jobs(){
        return $this->hasMany('App\ProgramJob','id','category_id');
    }
}
