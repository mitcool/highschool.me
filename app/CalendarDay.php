<?php
namespace App;

use App\Calendar;
use Carbon\Carbon;

class CalendarDay{

    function __construct($hour_id){
        $this->date = Calendar::find($hour_id);
        $this->calendar_date = $this->date->formatted_date();
        $this->calendar_hours = Calendar::where('date',$this->date->date)->get();
    }

    public $date;
    public $calendar_date;
    public $calendar_hours;

    public function is_past(){
        return Carbon::parse($this->date->date) < Carbon::today();
    }
    public function is_today(){
        return Carbon::parse($this->date->date) == Carbon::today();
    }
    public function is_weekend(){
        return Carbon::parse($this->date->date)->isWeekend();
    }
    
   
}