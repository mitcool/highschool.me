<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramVideo extends Model
{
    use HasFactory;

    protected $fillable = ['link','link_de','program_id'];
    public $timestamps = false;

    public function link(){
        if(request()->segment(1) == 'de'){
            return $this->link_de;
        }
         return $this->link;
    }
}
