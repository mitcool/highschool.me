<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date_of_birth',
        'place_of_birth',
        'nationality',
        'country_of_residence',
        'timezone',
        'national_id_number',
        'languages',
        'educator_id',
        'consent'
    ];
}
