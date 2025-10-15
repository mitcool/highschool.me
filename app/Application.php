<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';
    public $timestamps = false;

    public function program(){

        return $this->hasOne('App\Program','id','program_id');
    }
}
