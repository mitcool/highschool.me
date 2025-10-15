<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    public $timestamps = false;

    public function translated(){
        return $this->hasOne('App\PartnerTranslation','partner_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\PartnerTranslation','partner_id','id');
    }
}
