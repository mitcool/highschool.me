<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressReleaseSection extends Model
{
    use HasFactory;

    private $SECTION_TYPES = ['text','image','blockquote','table'];


    public function details(){
        return $this->hasMany('App\PressReleaseSectionDetail','section_id','id');
    }

    public function all_translations(){
        return $this->hasMany('App\PressReleaseSectionTranslation','section_id','id');
    }
    
    public function translated(){
        return $this->hasOne('App\PressReleaseSectionTranslation','section_id','id')->where('locale',app()->currentLocale());
    }

    public function image_src(){
        return $this->hasOne('App\PressReleaseSectionTranslation','section_id','id')->where('locale','en');
    }

    public function attributes(){
        return $this->hasOne('App\PressReleaseImageAttribute','image_id','id');

    }
}
