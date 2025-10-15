<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Calendar extends Model
{
    use HasFactory;

    protected $connection = 'distributor_info';

    protected $table = 'calendar';

    public $timestamps = false;

    public function formatted_date(){
        return Carbon::parse($this->date)->format('j');
    }

    public function formatted_reserved_date(){
        return Carbon::parse($this->date)->format('F d ,Y');
    }
    public function formatted_time(){
        return Carbon::parse($this->time)->format('H:i');
    }

    public function is_hour_past(){
        $date = Carbon::parse($this->date)->format('d-m-Y');
        $exact_hour = Carbon::parse($date.' '.$this->time);
        return Carbon::parse($exact_hour) < Carbon::now('Europe/Athens');
    }

    // public function correct_time(){
    //     $date = Carbon::parse($this->date)->format('d-m-Y');
    //     $exact_hour = Carbon::parse($date.' '.$this->time);
    //     return $exact_hour;
    // }
    public function day_of_week(){
       
        $day = strtoupper(Carbon::parse($this->date)->locale('de')->dayName);
        if(request()->segment(1) == 'en'){
            $day = strtoupper(Carbon::parse($this->date)->englishDayOfWeek);
            return  $day;
        }
        return $day;
    }

    public function end_meeting (){
        return Carbon::parse($this->time)->addMinutes(45)->format('H:i');
    }

    public function guest(){
        return $this->hasOne('App\CalendarGuest','id','guest_id');
    }
}
