<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $table = 'periods';

    public function translated(){
        return $this->hasOne('App\PeriodTranslation','period_id','id')->where('locale',app()->currentLocale());
    }
}
