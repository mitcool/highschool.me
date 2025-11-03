<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','price_per_month','price_per_year'];
    
    public $timestamps = false;

    public function price_per_month(){
            return number_format(($this->price_per_month/100),2,'.','');
    }

    public function price_per_year(){
        return number_format(($this->price_per_year/100),2,'.','');
    }
}
