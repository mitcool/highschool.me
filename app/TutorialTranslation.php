<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialTranslation extends Model
{
    use HasFactory;

    protected $table = 'tutorials_translations';
    public $timestamps = false;
}
