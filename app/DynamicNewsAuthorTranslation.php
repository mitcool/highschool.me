<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNewsAuthorTranslation extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news_authors_translations';
    
    public $timestamps = false;

}
