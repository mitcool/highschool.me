<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function features(){
        return $this->hasMany('App\PlanFeature','plan_id','id');
    }
}
