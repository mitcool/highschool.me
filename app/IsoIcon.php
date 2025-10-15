<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIcon extends Model
{
    use HasFactory;

    protected $fillable = ['text','text_de','icon','link','link_de'];
    public $timestamps = false;
}
