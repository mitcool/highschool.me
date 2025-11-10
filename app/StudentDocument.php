<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;

    public function document_type(){
        return $this->hasOne('App\DocumentType','id','type');
    }
}
