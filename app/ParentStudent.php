<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['status','expired_at','is_disabled','grade','date_of_birth'];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }
}
