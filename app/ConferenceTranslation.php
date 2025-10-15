<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceTranslation extends Model
{
    use HasFactory;

    protected $table = 'conferences_translations';
    public $timestamps = false;
}
