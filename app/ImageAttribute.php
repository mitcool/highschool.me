<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageAttribute extends Model
{
    use HasFactory;

    protected $table = 'images_attributes';
    public $timestamps = false;
}
