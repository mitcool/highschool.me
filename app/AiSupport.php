<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiSupport extends Model
{
    use HasFactory;

    protected $fillable = ['ai_support_text','ai_support_text_de','program_id'];
    public $timestamps = false;
}
