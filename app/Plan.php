<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','price_per_month','price_per_year'];

    const CORE  = 1;
    const PRO = 2;
    const ELITE = 3;

    const CORE_TOKENS = 1500;
    const PRO_AND_ELITE_TOKENS = 3000;
    
    public $timestamps = false;

    public function price_per_month(){
            return number_format(($this->price_per_month),2,'.',',');
    }

    public function price_per_year(){
        return number_format(($this->price_per_year),2,'.',',');
    }
}
