<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicNewsSectionDetail extends Model
{
    use HasFactory;

    protected $table = 'dynamic_news_sections_details';

    public function translated(){
        return $this->hasOne('App\DynamicNewsSectionDetailTranslation','detail_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\DynamicNewsSectionDetailTranslation','detail_id','id');
    }
}
