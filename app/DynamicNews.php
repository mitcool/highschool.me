<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNews extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news';

    public function sections(){
        return $this->hasMany('App\DynamicNewsSection','news_id','id');
    }

    public function author(){
        return $this->hasOne('App\DynamicNewsAuthor','id','author_id');
    }

}
