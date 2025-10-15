<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $table = 'tutorials';
    public $timestamps = false;

    public function translated(){

        return $this->hasOne('App\TutorialTranslation')->where('locale',app()->currentLocale());
    }

    public function all_translations(){

        return $this->hasMany('App\TutorialTranslation');
    }
}
