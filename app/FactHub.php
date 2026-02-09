<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FactHub extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'fact_hubs';

    protected $fillable = ['author_id','slug','key_facts','minutes','meta_title','meta_description','image'];

    public function sections(){
        return $this->hasMany('App\FactHubSection','news_id','id');
    }

    public function author(){
        return $this->hasOne('App\DynamicNewsAuthor','id','author_id');
    }
}
