<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneRequest extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone_code','phonenumber','hour'];
}
