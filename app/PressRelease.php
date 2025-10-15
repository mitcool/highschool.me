<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

     public function sections(){
        return $this->hasMany('App\PressReleaseSection','news_id','id');
    }

    public function main_image(){
        return $this->hasOne('App\PressReleaseSection','news_id','id')->where('type',2);
    }

     public function author(){
        return $this->hasOne('App\DynamicNewsAuthor','id','author_id');
    }

    public function translated(){
        return $this->hasOne('App\PressReleaseTranslation','news_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\PressReleaseTranslation','news_id','id');
    }

    public function citations(){
        return $this->hasMany('App\PressReleaseCitation','news_id','id');
    }
}
