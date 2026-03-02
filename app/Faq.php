<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\FaqTranslation;

class Faq extends Model
{
    protected $table = 'faq';
    public $timestamps = false;
    protected $fillable = ['question','answer','meta_title','meta_description','category_id'];

    public function translated(){
      return $this->hasOne('App\FaqTranslation','faq_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
      return $this->hasMany('App\FaqTranslation','faq_id','id');
    }
}

