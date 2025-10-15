<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNewsSectionTranslation extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news_sections_translations';

    public $timestamps = false;
}
