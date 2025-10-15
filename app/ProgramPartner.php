<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPartner extends Model
{
    use HasFactory;

    public function partner(){
        return $this->hasOne('App\Partner','id','partner_id');
    }
}
