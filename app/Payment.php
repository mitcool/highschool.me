<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public function translated(){
        return $this->hasOne('App\PaymentTranslation','payment_id','id')->where('locale',app()->currentLocale());
    }
}
