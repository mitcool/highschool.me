<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    public function featureObject(){
        return $this->hasOne('App\Feature','id','feature_id');
    }

    public function planObject(){
        return $this->hasOne('App\Plan','id','plan_id');
    }
}
