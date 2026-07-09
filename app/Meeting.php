<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\StudentMeeting;
use Carbon\Carbon;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['start','link','educator_id','type','subject_id'];

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

    public function course(){
        return $this->hasOne('App\CatalogCourse','id','subject_id');
    }

    public function is_full(){
        if($this->type == 12){
            return count($this->students) > 9;
        }
        else{
            return count($this->students) > 0;
        }
    }

    public function local_time(){
        return Carbon::parse($this->start)->setTimezone(session('timezone'))->format('g:iA');
    }

    public function local_date(){
        return Carbon::parse($this->start)->setTimezone(session('timezone'))->format('F d,Y');
    }

    public function is_alredy_booked(){
        return StudentMeeting::where('meeting_id',$this->id)->where('student_id',auth()->id())->count()  > 0;
    }
}
