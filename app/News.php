<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
	
	public function keywords()
    {
        return $this->hasOne('App\NewsKeyword', 'article_id', 'id');
    }

    public function all_translations(){
        return $this->hasMany('App\NewsTranslation','news_id','id');
    }

    public function translated(){
        return $this->hasOne('App\NewsTranslation','news_id','id')->where('locale',app()->currentLocale());
    }

}
