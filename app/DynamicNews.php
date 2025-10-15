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

    public function main_image(){
        return $this->hasOne('App\DynamicNewsSection','news_id','id')->where('type',2);
    }

    public function author(){
        return $this->hasOne('App\DynamicNewsAuthor','id','author_id');
    }

    public function category(){
        return $this->hasOne('App\DynamicNewsCategory','id','category_id');
    } 

    public function translated(){
        return $this->hasOne('App\DynamicNewsTranslation','news_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\DynamicNewsTranslation','news_id','id');
    }
}
