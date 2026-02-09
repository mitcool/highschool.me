<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNewsSection extends Model
{
    use HasFactory,SoftDeletes;

    private $SECTION_TYPES = ['text','image','blockquote','table'];

    protected $table = 'dynamic_news_sections';

    protected $fillable = ['content','news_id','type'];

    public function details(){
        return $this->hasMany('App\DynamicNewsSectionDetail','section_id','id');
    }

    public function all_translations(){
        return $this->hasMany('App\DynamicNewsSectionTranslation','section_id','id');
    }
    
    public function translated(){
        return $this->hasOne('App\DynamicNewsSectionTranslation','section_id','id')->where('locale',app()->currentLocale());
    }

    public function image_src(){
        return $this->hasOne('App\DynamicNewsSectionTranslation','section_id','id')->where('locale','en');
    }

    public function attributes(){
        return $this->hasOne('App\DynamicNewsImageAttribute','image_id','id');

    }
}
