<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    const TRACKS = [
        1 => '24',
        2 => '18',
        3 => 'Transfer Program', ];

    protected $fillable = ['student_id','track','grade'];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function verification_of_graduation(){
        return $this->hasOne('App\VerificationOfGraduation','student_id','student_id');
    }

    public function track(){
        return self::TRACKS[$this->track];
    }
}
