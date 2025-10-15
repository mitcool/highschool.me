<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AiText extends Model
{
    use HasFactory,SoftDeletes;

    protected $connection = 'ai_tool';

    public $timestamps = false;

    protected $table = 'texts';

    protected $fillable = [
       'text_en', 'text_de' ,'title', 'slug'
    ];

}
