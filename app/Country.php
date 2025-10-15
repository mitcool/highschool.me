<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function full_name(){
        if(request()->segment(1) == 'en'){
            return $this->nicename;
        }
        return $this->nicename_de;
    }
}
