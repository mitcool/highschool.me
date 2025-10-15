<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTranslation extends Model
{
    use HasFactory;

    protected $table = 'program_translations';
    public $timestamps = false;


    public function tutorial(){
        return $this->hasOne('App\TutorialTranslation','slug','slug');
    }
}

