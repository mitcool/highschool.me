<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationTranslation extends Model
{
    use HasFactory;

    protected $table = 'publications_transaltions';
    public $timestamps = false;
}
