<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';

	public function faqs(){

		return $this->hasMany('App\Faq','category_id','id');
	}
   
	public function translated(){
		return $this->hasOne('App\FaqCategoryTranslation','category_id','id')->where('locale',app()->currentLocale());
	  }
	public function all_translations(){
		return $this->hasMany('App\FaqCategoryTranslation','category_id','id');
	}
}
