<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherStaff extends Model
{
    use HasFactory;

    protected $fillable = ['role','name','middlename','surname','email'];

    public $timestamps = false;

    public function fullname(){
        return $this->name.' '.$this->middlename.' '.$this->surname;
    }
}
