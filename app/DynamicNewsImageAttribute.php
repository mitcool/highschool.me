<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicNewsImageAttribute extends Model
{
    use HasFactory;

    protected $table = 'dynamic_news_image_attributes';
    public $timestamps = false;

    public function alt(){
        if(session()->get('applocale')  == 'de'){
            return $this->alt_de;
        }
        return $this->alt_en;
    }

    public function title(){
        if(session()->get('applocale')  == 'de'){
            return $this->title_de;
        }
        return $this->title_en;
    }
}
