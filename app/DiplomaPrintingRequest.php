<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaPrintingRequest extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','status'];

    public function user(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function status(){
        if($this->status == 0){
            return 'Requested';
        }
        elseif($this->status==1){
            return 'Sent';
        }
        else{
            return 'Delivered';
        }
    }
}
