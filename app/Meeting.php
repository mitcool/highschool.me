<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['date','start','end','link','educator_id','type'];

     protected $casts = [
        'date' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function students(){
        return $this->hasMany('App\StudentMeeting','meeting_id','id');
    }

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }

    public function curriculum_type(){
        return $this->hasOne('App\CurriculumType','id','type');
    }
}
