<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocuments extends Model
{
    use HasFactory;

    protected $fillable = ['text','text_de','program_id'];
    public $timestamps = false;
}
