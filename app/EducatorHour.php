<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorHour extends Model
{
    use HasFactory;

    protected $fillable = ['date','start','end','educator_id','type'];

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

     public function students(){
        return $this->hasMany('App\StudentMeeting','educator_hour_id','id');
    }

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }
}
