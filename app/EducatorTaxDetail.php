<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorTaxDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['tax_residency','national_id_number','us_tax_resident','registration_number','educator_id'];

    public function tax_country(){
        return $this->hasOne('App\Country','id','tax_residency');
    }
}
