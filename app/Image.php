<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    public $timestamps = false;

    public function translated(){
        return $this->hasOne('App\ImageAttribute','image_id','id')->where('locale',app()->currentLocale());
    }

    public function attributes(){
        return $this->hasMany('App\ImageAttribute','image_id','id');

    }

}
