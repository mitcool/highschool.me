<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbassadorService extends Model
{
    use HasFactory;

    public function actions(){
        return $this->hasMany('App\AmbassadorServiceAction','service_id','id');
    }
}
