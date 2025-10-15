<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PressReleaseCitation extends Model
{
    use HasFactory;

   protected $casts = [
    'date'  => 'datetime',
    ];
}
