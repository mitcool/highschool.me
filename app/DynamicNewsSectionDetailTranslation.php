<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicNewsSectionDetailTranslation extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news_section_detail_tranlations';

    public $timestamps = false;
}
