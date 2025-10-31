<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    use HasFactory;

    public function features(){
        return $this->hasMany('App\Feature','category_id','id')->orderBy('_order');
    }
}
