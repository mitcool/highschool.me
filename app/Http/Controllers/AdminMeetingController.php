<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use Carbon\Carbon;

use App\GroupSession;
use App\MentoringSession;
use App\CoachingSession;
use App\FamilyConsultation;
use App\FamilyConsultationRequest;
use App\User;
use App\Notification;
use App\Meeting;
use App\EducatorHour;
use App\CurriculumType;

use App\Mail\DatesForStudentSession;
use App\Mail\EducatorMeetingDetails;

class AdminMeetingController extends Controller
{
    public function groupSessions(){
        $educators = User::where('role_id',5)->get();
        // $types = CurriculumType::where('id','>',11)->get();
        
        return view('admin.meetings.group-sessions')
            // ->with('types',$types)
            ->with('educators',$educators);
    }
    public function addgroupSession(){
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.add-group-sessions')
            ->with('educators',$educators);
    }

    public function createGroupSession(Request $request){
        $start = $request->start;
        $end = $request->end;
        $link= $request->link;
        $educator_id = $request->educator_id;
        $educator = User::find($educator_id);
        $date = $request->date;
        $type = $request->type;
        $meetings = [];
        foreach($start as $key => $s){
            $meeting  = Meeting::create([
                'start' => $start[$key],
                'end' => $end[$key],
                'link' => $link[$key],
                'educator_id' => $educator_id,
                'type' => $type[$key],
                'date' => $date
             ]);
             array_push($meetings,$meeting);
        }

        try{
            Mail::to($educator->email)->send(new EducatorMeetingDetails($educator,$meetings));
        }catch(\Exception $e){
            info($e->getMessage());
        }
       
        Notification::add($educator_id,'New session dates added from admin');
        return redirect()->route('admin-group-sessions')
            ->with('success_message','Group session created successfully');
    }

    public function familyConsultations(){
        $family_consultations = FamilyConsultationRequest::all();
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.family-consultations')
            ->with('educators',$educators)
            ->with('family_consultations',$family_consultations);
    }

    public function createFamilyConsultation(Request $request,$family_consultation_request_id){
        $family_consultation_request = FamilyConsultationRequest::find($family_consultation_request_id);
        FamilyConsultation::create([
            'start' => $request->start,
            'end' => $request->end,
            'date' => $request->date,
            'link' => $request->link,
            'educator_id' =>$request->educator_id,
            'parent_id' => $family_consultation_request->parent_id,
            'request_id' => $family_consultation_request->id,
           
        ]);
        $family_consultation_request->update([ 'status' => 1]);
        return redirect()->back()->with('success_message','Family consultation added successfully');
    }

    public function markFamilyConsultationAsCompleted($family_consultation_request_id){
        $family_consultation_request = FamilyConsultationRequest::find($family_consultation_request_id);
        $family_consultation_request->update([ 'status' => 2]);
        return redirect()->back()->with('success_message','Family consultation marked as completed');
    }
}
