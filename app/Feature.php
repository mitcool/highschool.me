<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['feature','category_id','pro','core','elite','pro_tooltip','core_tooltip','elite_tooltip','order'];

    public $timestamps = false;

    public function pro(){
        // if($this->pro == 'Yes'){
        //     return '<i class="fas fa-check" style="color:green"></i>';
        // }
        // elseif($this->pro == 'No'){
        //     return '<i class="fas fa-ban" style="color:red"></i>';
        // }
        // else{
            return $this->pro;
        //}
    }

     public function core(){
        // if($this->core == 'Yes'){
        //     return '<i class="fas fa-check" style="color:green"></i>';
        // }
        // elseif($this->core == 'No'){
        //     return '<i class="fas fa-ban" style="color:red"></i>';
        // }
        // else{
            return $this->core;
        //}
    }
     public function elite(){
        // if($this->elite == 'Yes'){
        //     return '<i class="fas fa-check" style="color:green"></i>';
        // }
        // elseif($this->elite == 'No'){
        //     return '<i class="fas fa-ban" style="color:red"></i>';
        // }
        // else{
            return $this->elite;
        //}
    }
}
