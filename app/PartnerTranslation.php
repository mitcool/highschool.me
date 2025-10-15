<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    use HasFactory;

    protected $table = 'partners_translations';
    public $timestamps = false;
}
