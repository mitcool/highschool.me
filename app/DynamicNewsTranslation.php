<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNewsTranslation extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news_translations';
    public $timestamps= false;

    public function short_description(){
        return '1';
    }
}
