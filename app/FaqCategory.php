<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';
    
    public $timestamps = false;

	public function faqs(){
		return $this->hasMany('App\Faq','category_id','id');
	}
   
}
