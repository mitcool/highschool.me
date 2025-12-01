<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupSession;

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
}
