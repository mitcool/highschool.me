<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AiService extends Model
{
    use HasFactory,SoftDeletes;

    protected $connection = 'ai_tool';

    protected $table = 'services';

     protected $fillable = [
        'name', 'name_de', 'description', 'description_de','question', 'question_de', 'slug','slug_de', 'category_id','max_tokens','temperature','model','meta_title','meta_description','meta_title_de','meta_description_de','alt_en','alt_de','title_en','title_de','public_page_top','public_page_top_de','public_page_bottom','public_page_bottom_de',
    ];

}
