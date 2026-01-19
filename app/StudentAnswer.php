<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['comment'];
    public function question(){
        return $this->hasOne('App\ExamQuestion','id','question_id');
    }
}
