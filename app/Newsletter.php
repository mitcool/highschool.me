<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['sender','subject','subject_de','cover_image','greeting_en','greeting_de'];
    protected $table = 'newsletters';
    
    public function sections(){
        return $this->hasMany('App\NewsletterSection','newsletter_id','id');
    }
}
