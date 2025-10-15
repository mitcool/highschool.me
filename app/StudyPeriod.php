<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPeriod extends Model
{
    use HasFactory;

    protected $table = 'studies_periods';

    public $timestams = false;

    public function period(){

        return $this->hasOne('App\Period','id','period_id');
    }

    public function studies(){

        return $this->hasMany('App\Study','id','study_id');
    }
}
