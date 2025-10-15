<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactHub extends Model
{
    use HasFactory;

    protected $table = 'fact_hubs';

    public function sections(){
        return $this->hasMany('App\FactHubSection','news_id','id');
    }

    public function main_image(){
        return $this->hasOne('App\FactHubSection','news_id','id')->where('type',2);
    }

    public function author(){
        return $this->hasOne('App\DynamicNewsAuthor','id','author_id');
    }

    public function translated(){
        return $this->hasOne('App\FactHubTranslation','news_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\FactHubTranslation','news_id','id');
    }
}
