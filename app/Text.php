<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;

    protected $table = 'texts';
    public $timestamps = false;

    public function translated(){
		return $this->hasOne('App\Text', 'id')->where('locale',app()->currentLocale());
    }
}
