<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    public $timestamps = false;

    public function authors(){

    	return $this->hasMany('App\Author','publication_id','id');
    }

    public function translated(){ 

        return $this->hasOne('App\PublicationTranslation','publication_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){ 

        return $this->hasMany('App\PublicationTranslation','publication_id','id');
    }
}
