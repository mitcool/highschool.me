<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MentoringSession extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['date','start','end','link','educator_id'];

    protected $casts = [
        'date' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');
    }

    public function local_start(){
        return Carbon::parse($this->start)->setTimezone(session('timezone'));
    }
    public function local_end(){
        return Carbon::parse($this->end)->setTimezone(session('timezone'));
    }

    public function type(){
        return 'Personal Mentoring Session';
    }

     public function students(){
        return $this->hasMany('App\UserMentoringSession','session_id','id');
    }

}
