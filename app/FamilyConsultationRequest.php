<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyConsultationRequest extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id','status'];

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }

    public function meetings(){
         return $this->hasMany('App\FamilyConsultation','request_id','id');
    }
}
