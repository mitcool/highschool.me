<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicNewsCategory extends Model
{
    use HasFactory;

    protected $table = 'dynamic_news_categories';
    
    protected function translated(){
        return $this->hasOne('App\DynamicNewsCategoryTranslation','category_id','id')->where('locale',app()->currentLocale());
    }

    protected function all_translations(){
        return $this->hasMany('App\DynamicNewsCategoryTranslation','category_id','id');
    }

    //for hreflang only
    public function english_category(){
        return $this->hasOne('App\DynamicNewsCategoryTranslation','category_id','id')->where('locale','en');
    }

    public function german_category(){
        return $this->hasOne('App\DynamicNewsCategoryTranslation','category_id','id')->where('locale','de');
    }
}
