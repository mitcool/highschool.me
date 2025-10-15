<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsKeyword extends Model
{
    protected $table = 'news_keywords';
    public $timestamps = false;
	
	public function news()
    {
        return $this->belongsTo('App\News', 'article_id', 'id');
    }
}
