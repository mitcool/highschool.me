<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';
    public $timestamps = false;

    public function translated(){
        return $this->hasOne('App\TestimonialTranslation','testimonial_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\TestimonialTranslation','testimonial_id','id');
    }
}
