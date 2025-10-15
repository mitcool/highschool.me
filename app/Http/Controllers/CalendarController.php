<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;
use Carbon\Carbon;

use App\Calendar;
use App\CalendarDay;
use App\CalendarGuest;
use App\Country;

use App\Http\Requests\CalendarGuestRequest;

use App\Mail\CalendarReservationAdmin;
use App\Mail\CalendarReservation;

class CalendarController extends Controller
{
    private function getInvoiceNumber(){
        $next_invoice = Invoice::max('id') + 1;
        $numlength = strlen((string)$next_invoice);
        $unique_number = '04';
        for ($i = 3; $i <= (10 - $numlength); $i++) {
            $unique_number .= '0';
        }
        $unique_number .= $next_invoice;
        return $unique_number;
    }
   
    public function showCalendarPage($month=null,$year=null){
       
        Session::forget('hour');
        Session::forget('details');
        if(!$month){
            $now = Carbon::now();
        }
        else{
            $now = Carbon::parse($year.'/'.$month.'/'.'1');
            
        }
        
        $month_name = $now->copy()->format('F');
        $year_name = $now->copy()->format('Y');
        $current_month_weeks =  Calendar::where('date','>=', $now->copy()->startOfMonth())
            ->where('date','<=',$now->copy()->endOfMonth())
            ->get()
            ->groupBy('week');
        // TODO:: fix names of variables
       
        foreach($current_month_weeks as $week_days_with_hours){
            $unique_days = [];
            $calendar_days = [];
            foreach($week_days_with_hours as $hour){
                if(!in_array($hour->formatted_date(),$unique_days)){
                    $calendar_day = new CalendarDay($hour->id);
                    array_push($unique_days,$hour->formatted_date());
                    array_push($calendar_days,$calendar_day);
                    
                }
            }
            $week_days_with_hours->calendar_days = $calendar_days;
        }
        
        $next = $now->copy()->addMonth(1)->startOfMonth()->format('m/Y');
        $last = $now->copy()->subMonth(1)->startOfMonth()->format('m/Y');
        return view('calendar.calendar')
            ->with('next',$next)
            ->with('last',$last)
            ->with('current_month_weeks', $current_month_weeks)
            ->with('year_name',$year_name)
            ->with('month_name',$month_name);
    }

    public function appointHour(Request $request){
       $request->validate([
            'hour' => 'required'
       ]);
       Session::put('hour',$request->get('hour'));
       return redirect()->route('appointment-details-'.app()->currentLocale());
    }

    public function appointmentDetails(){
        if(!Session::has('hour')){
            return redirect()->route('calendar');
        }
        $countries = Country::select('nicename','nicename_de','phonecode')->get();
        $reserved_hour = Calendar::find(Session::get('hour'));
        return view('calendar.appointment-details')
            ->with('countries',$countries)
            ->with('reserved_hour',$reserved_hour);
    }

    public function recordAppointment(CalendarGuestRequest $request){
        $input = $request->validated();
        Session::put('details', $input);
        return redirect()->route('success-'.app()->currentLocale())
            ->with('success_message','Success');
    }


    public function success(){
        $hour_id = Session::get('hour');
        $details = Session::get('details');
        if(Session::has('hour') && Session::has('details')){
            $details['website'] = config('app.url');
            $guest_id = CalendarGuest::insertGetId($details);
            Calendar::where('id', $hour_id)->update(['is_reserved' => 1,'guest_id' => $guest_id]);
            $hour = Calendar::with('guest')->find($hour_id);  

            try{
                Mail::to($details['email'])->send(new CalendarReservation($hour));
            }catch(\Exception $e){
                info($e->getMessage());
            }
            try{
                Mail::to('mathias.kunze@onsites.com')->send(new CalendarReservationAdmin($hour));
            }catch(\Exception $e){
                info($e->getMessage());
            }
        }
        
        Session::forget('hour');
        Session::forget('details');
        Session::forget('invoice');
        
        return view('calendar.success');
    }
}
