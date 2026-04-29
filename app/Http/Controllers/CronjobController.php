<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Mail;

use App\ParentStudent;
use App\Exam;
use App\Notification;
use App\GroupSession;

use App\Mail\SubscribtionExpired;
use App\Mail\SubscribtionExpirationReminder;
use App\Mail\ExamReminder;
use App\Mail\ExamNoAttended;
use App\Mail\ExamNoAttendedParent;
use App\Mail\SessionReminder;
 
class CronjobController extends Controller
{
    #Cronjob on the server
    public function checkSubscribtions(){
        $active_student_status = 2;
        $subscribtions = ParentStudent::where('status',$active_student_status)->get();
        foreach($subscribtions as $subscribtion){
            if(Carbon::now() > Carbon::parse($subscribtion->expired_at)){
                ParentStudent::where('student_id',$subscribtion->student_id)->update([
                    'status' => 1,
                    'expired_at' => null
                ]);

                try{
                    Mail::to($subscribtion->parent->email)->send(new SubscribtionExpired);
                }catch(\Exception $e){
                    info($e->getMessage());
                }
            }
            if(Carbon::now()->addDays(10) > Carbon::parse($subscribtion->expired_at)){
                try{
                    Mail::to($subscribtion->parent->email)->send(new SubscribtionExpirationReminder);
                }catch(\Exception $e){
                    info($e->getMessage());
                }
            }
        }
        return;
    }

    public function updateStudyMentorQuestions(){
        #student without those who book single mentoring sessions only
        $students = ParentStudent::where('track','!=',5)->where('status',ParentStudent::ACTIVE)->get();

        if(Carbon::now()->format('d') == 1){
            foreach($students as $student){
                
                if($student->student->active_plan || $student->track == 4 || $student->track == 3){
                    #NOTE tokens == questions 
                    $tokens = $student->student->active_plan->plan_id == 3 ? 1200 : 500;
                    $student->update(['tokens' => ($student->student_details->tokens + $tokens)]);
                    Notification::add($student->student_id,"Congratulations you have received new  ".$tokens. " questions for AI Study Mentor");
                }
                
            }
        }
    }

    public function failExamsWhereStudentDoesntShowTo(){
        $exams = Exam::where('status',Exam::STATUS_APPOINTED)->get();
        foreach($exams as $exam){
            $hours_for_exam = 0;
            if($exam->type == 1 && $exam->student->student_details->is_disabled == 1){
                $hours_for_exam = Exam::TIME_DISABLED_STUDENT;
            }
            elseif($exam->type == 1){
                $hours_for_exam = Exam::TIME_REGULAR;
            }
            else{
                $hours_for_exam = Exam::TIME_ESSAY;
            }
            if($exam->datetime->copy()->addHours($hours_for_exam) < Carbon::now()){
                $parent = $exam->student->student_details->parent;   
                $exam->update([
                    'status' => Exam::STATUS_EVALUATED,
                    'grade' => 0
                ]);

                try{
                    Mail::to($exam->student->email)->send(new ExamNoAttended($exam));
                }catch(\Exception $e){
                    info($e->getMessage());
                }

                try{
                    Mail::to($parent->email)->send(new ExamNoAttendedParent($parent,$exam));
                }catch(\Exception $e){
                    info($e->getMessage());
                }

                Notification::add($exam->student_id,'You have been marked as failed for the '.$exam->course->course->title.' examination due to non-attendance.');
                Notification::add($parent->id,'Your child didn\'t attend the exam for course '.$exam->course->course->title);
            }
            
        
            /// 1 day reminder
            if($exam->datetime->isTomorrow() && !$exam->reminder){
                try{
                    Mail::to($exam->student->email)->send(new ExamReminder($exam));
                }catch(\Exception $e){
                    info($e->getMessage());
                }
                $exam->update(['reminder' => 1]);
            }

        }
    }

    public function sessionsReminder(){

        $group_sessions = GroupSession::where('date','>',Carbon::now())->get();

        foreach($group_sessions as $group_session){
            if($group_session->date->isTomorrow()){
                foreach($group_session->students as $student){
                    try{
                        Mail::to($student->user->email)->send(new SessionReminder($group_session,$student->user));
                    }catch(\Exception $e){
                        info($e->getMessage());
                    }
                }
            }
            
        }
    }

    public function graduationReminder(){
        $parent_students = ParentStudent::where('status','!=',ParentStudent::GRADUATED)->get();
        foreach($parent_students as $student){
            if(Carbon::parse($student->created_at)->addWeeks(42) > Carbon::now()){
                foreach($group_session->students as $student){
                    try{
                        Mail::to($student->user->email)->send(new SessionReminder($group_session,$student->user));
                    }catch(\Exception $e){
                        info($e->getMessage());
                    }
                }
            }
        }
    }
}
