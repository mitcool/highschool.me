<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_de'];

    public $timestamps = false;
    
    public function jobs(){
        return $this->hasMany('App\Job','category_id','id');
    }
}
