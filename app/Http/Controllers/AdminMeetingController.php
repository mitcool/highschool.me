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
use App\EducatorHour;
use App\CurriculumType;
use App\Mail\DatesForStudentSession;

class AdminMeetingController extends Controller
{
    public function groupSessions(){
        $educators = User::where('role_id',5)->get();
        $types = CurriculumType::where('id','>',11)->get();
        
        return view('admin.meetings.group-sessions')
            ->with('types',$types)
            ->with('educators',$educators);
    }
    public function addgroupSession(){
        $educators = User::where('role_id',5)->get();
        return view('admin.meetings.add-group-sessions')
            ->with('educators',$educators);
    }

    public function createGroupSession(Request $request){
        $request->validate([
            'session_type' => 'required|array',
            
        ]);
        $educator_hours = $request->session_type;
        $educator_id = $request->educator_id;

        foreach($educator_hours as $id =>  $type){
            EducatorHour::find($id)->update(['type' => $type]);
        }

        // try{
        //     Mail::to($educator->email)->send(new DatesForStudentSession($educator,$data));
        // }catch(\Exception $e){
        //     info($e->getMessage());
        // }
        Notification::add($educator_id,'New session dates added from admin');
        return redirect()->route('admin-group-sessions')
            ->with('success_message','Group session created successfully');
    }

    
}
