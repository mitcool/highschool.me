<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasVideoEmbed;

class FactHubSection extends Model
{
    use HasFactory,SoftDeletes,HasVideoEmbed;

    protected $fillable = ['content','news_id','type','position'];
    
    public function all_translations(){
        return $this->hasMany('App\FactHubSectionTranslation','section_id','id');
    }
    
    public function translated(){
        return $this->hasOne('App\FactHubSectionTranslation','section_id','id')->where('locale',app()->currentLocale());
    }

    public function image_src(){
        return $this->hasOne('App\FactHubSectionTranslation','section_id','id')->where('locale','en');
    }

    public function attributes(){
        return $this->hasOne('App\FactHubImageAttribute','image_id','id');

    }
}
