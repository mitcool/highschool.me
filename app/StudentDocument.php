<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;

     protected $fillable = ['is_approved'];

    public function document_type(){
        return $this->hasOne('App\DocumentType','id','type');
    }

    public $timestamps = false;

   
}
