<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'faq_categories_translation';
    public $timestamps = false;
}
