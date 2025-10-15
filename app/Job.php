<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['slug','slug_de','name','name_de',
    'description','description_de','meta_title','meta_title_de','meta_description','meta_description_de','category_id'];

    public $timestamps = false;
}
