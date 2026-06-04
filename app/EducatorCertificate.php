<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorCertificate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['educator_id','name'];

}
