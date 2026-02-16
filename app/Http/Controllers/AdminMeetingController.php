<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GroupSession;
use App\MentoringSession;
use App\CoachingSession;
use App\FamilyConsultation;
use App\FamilyConsultationRequest;
use App\User;

class AdminMeetingController extends Controller
{
    public function groupSessions(){
        $group_sessions = GroupSession::all();
        
        return view('admin.meetings.group-sessions')
                
                ->with('group_sessions',$group_sessions);
    }
    public function addgroupSession(){
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.add-group-sessions')
            ->with('educators',$educators);
    }

    public function createGroupSession(Request $request){
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'link' => 'required',
            'educator_id' => 'required'
        ]);
        $dates = $request->date;
        $start = $request->start;
        $end = $request->end;
        $link = $request->link;
        $educator_id = $request->educator_id;
        foreach($dates as $key => $date){
            $group_session = [];
            $group_session['date'] = $dates[$key];
            $group_session['start'] = $start[$key];
            $group_session['end'] = $end[$key];
            $group_session['link'] = $link[$key];
            $group_session['educator_id'] = $educator_id;
            GroupSession::create($group_session);
        }
        
        return redirect()->route('admin-group-sessions')
            ->with('success_message','Group session created successfully');
    }

    public function mentoringSessions(){
        $mentoring_sessions = MentoringSession::all();
        return view('admin.meetings.mentoring-session')
            ->with('mentoring_sessions',$mentoring_sessions);
    }

    public function createMentoringSession(Request $request){
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'link' => 'required',
            'educator_id' => 'required'
        ]);
        $dates = $request->date;
        $start = $request->start;
        $end = $request->end;
        $link = $request->link;
        $educator_id = $request->educator_id;
        foreach($dates as $key => $date){
            $mentoring_session = [];
            $mentoring_session['date'] = $dates[$key];
            $mentoring_session['start'] = $start[$key];
            $mentoring_session['end'] = $end[$key];
            $mentoring_session['link'] = $link[$key];
            $mentoring_session['educator_id'] = $educator_id;
            MentoringSession::create($mentoring_session);
        }

        return redirect()->route('admin-mentoring-sessions')->with('success_message','Mentoring session created successfully');
    }

    public function addMentoringSession (){
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.add-mentoring-sessions')
            ->with('educators',$educators);
    } 

    public function familyConsultations(){
        $family_consultations = FamilyConsultationRequest::all();
        return view('admin.meetings.family-consultations')
            ->with('family_consultations',$family_consultations);
    }

    public function addFamilyConsultation($request_id){
        $family_consultations = FamilyConsultation::all();
        $parents = User::where('role_id',2)->get();
        $educators = User::where('role_id',4)->get();
        return view('admin.meetings.add-family-consultation')
            ->with('educators',$educators)
            ->with('request_id',$request_id)
            ->with('parents',$parents);
    }

    public function createFamilyConsultation(Request $request , $request_id){
        $dates = $request->date;
        $starts = $request->start;
        $ends = $request->end;
        $links = $request->link;
        $educator_id = $request->educator_id;
        $parent_id = $request->parent_id;
        
        foreach($dates as $key => $date){
           FamilyConsultation::create([
                'educator_id' => $educator_id,
                'parent_id' => $parent_id,
                'date' => $dates[$key],
                'start' => $starts[$key],
                'end' => $ends[$key],
                'link' => $links[$key],
                'request_id' => $request_id //#pending confirmation
           ]);
        }

        return redirect()->route('admin-family-consultations')->with('success_message','Family consultation created successfully');
    }

    public function markFamilyConsultationAsCompleted($request_id){
        FamilyConsultationRequest::find($request_id)->update(['status' => 2]);
        return redirect()->route('admin-family-consultations')->with('success_message','Family consultation updated successfully');

    }

    public function coachingSessions (){
        $coaching_sessions = CoachingSession::all();
        return view('admin.meetings.coaching-session')
            ->with('coaching_sessions',$coaching_sessions);
    }

    public function createCoachingSession(Request $request){
        $dates = $request->date;
        $start = $request->start;
        $end = $request->end;
        $link = $request->link;
        $educator_id = $request->educator_id;
        foreach($dates as $key => $date){
            $coaching_session = [];
            $coaching_session['date'] = $dates[$key];
            $coaching_session['start'] = $start[$key];
            $coaching_session['end'] = $end[$key];
            $coaching_session['link'] = $link[$key];
            $coaching_session['educator_id'] = $educator_id;
            CoachingSession::create($coaching_session);
        }
       
        return redirect()->route('admin-coaching-sessions')->with('success_message','Coaching session created successfully');
    }
    public function addCoachingSession(){
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.add-coaching-sessions')
                ->with('educators',$educators);
    }

}
