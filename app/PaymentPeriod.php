<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPeriod extends Model
{
    use HasFactory;

    protected $table = 'payments_periods';

    public function translated(){
        return $this->hasOne('App\Payment','id','payment_id')->where('locale',app()->currentLocale());                    
    }

    public function payment(){
        return $this->hasOne('App\Payment','id','payment_id');
    }
}
