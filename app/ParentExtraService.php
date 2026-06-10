<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentExtraService extends Model
{
    use HasFactory;

    const STATUSES = ['Pending','Sent','Delivered'];

    protected $fillable = ['copies','service_type','student_id','status'];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function type(){
        return $this->hasOne('App\ParentExtraServiceType','id','service_type');
    }

    public function status(){
        return self::STATUSES[$this->status];
    }
}
