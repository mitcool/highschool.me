<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GroupSession;
use App\MentoringSession;
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
        return view('admin.meetings.add-group-sessions');
    }

    public function createGroupSession(Request $request){

        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'link' => 'required',
            'educator_id' => 'required'
        ]);
        $group_session = $request->except('_token');
        GroupSession::create($group_session);

        //TODO::emails
        return redirect()->route('admin-group-sessions')->with('success_message','Group session created successfully');
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
        $group_session = $request->except('_token');
        MentoringSession::create($group_session);

        //TODO::emails
        return redirect()->route('admin-mentoring-sessions')->with('success_message','Mentoring session created successfully');
    }

    public function addMentoringSession (){
        return view('admin.meetings.add-mentoring-sessions');
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
}
