<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Mail;
use Cookie;
use Carbon\Carbon;

use App\User;
use App\ParentStudent;
use App\Plan;
use App\StudentDocument;
use App\InvoiceDetail;
use App\Country;
use App\Invoice;
use App\StudentPlan;
use App\FamilyConsultationRequest as FamilyConsultationRequestModel;
use App\CourseType;
use App\FamilyConsultation;
use App\GroupSession;
use App\MentoringSession;
use App\UserGroupSession;
use App\CoachingSession;
use App\UserMentoringSession;
use App\UserCoachingSessions;
use App\PaidGroupSession;
use App\PaidMentoringSession;
use App\PaidCoachingSession;
use App\CurriculumCourse;
use App\StudentEnrolledCourse;
use App\HelpDesk;
use App\LeaveRequest;
use App\AdditionalCourse;
use App\Notification;

use App\Mail\StudentCreated;
use App\Mail\StudentCredentials;
use App\Mail\StudentCreatedAdmin;
use App\Mail\PaymentSuccessfull;
use App\Mail\ParentReuploadDocument;
use App\Mail\FamilyConsultationRequest;
use App\Mail\FamilyConsultationRequestAdmin;
use App\Mail\CourseEnrolledParent;
use App\Mail\CourseEnrolledStudent;
use App\Mail\StudentReadyForExam;

use App\Services\StudentSessionsService;
use App\Services\StudentModuleCourseService;

class ParentController extends Controller
{
    private function setInvoiceNumber(){
        $next_invoice = Invoice::count() == 0 ? 1 : Invoice::count() + 1;
        $numlength = strlen((string)$next_invoice);
        $invoice_number = '01';
       
        for ($i = 3; $i <= (10 - $numlength); $i++) {
            $invoice_number .= '0';
        }
        $invoice_number .= $next_invoice;
        return $invoice_number;
    }

    private function createInvoice($amount,$description){

        Invoice::insert([
            'invoice_number' => $this->setInvoiceNumber(),
            'user_email' => auth()->user()->email,
            'price' => $amount,
            'name' => auth()->user()->name ,
            'created_at' => Carbon::now() ,
            'surname' => auth()->user()->surname,
            'street' => auth()->user()->invoice_details->street,
            'street_number' => auth()->user()->invoice_details->street_number,
            'city' => auth()->user()->invoice_details->city ,
            'ZIPcode' => auth()->user()->invoice_details->zip,
            'country_id' => auth()->user()->invoice_details->country_id,
            'description' => $description,
        ]);

        return;

    }
    public $student_sessions_service;
    public $student_module_course_service;

    public function __construct(StudentSessionsService $student_sessions_service,
                                StudentModuleCourseService $student_module_course_service ){
        $this->student_sessions_service = $student_sessions_service;
        $this->student_module_course_service = $student_module_course_service;
    }
    public function dashboard(){
        return view('parent.dashboard');
    }
    public function createStudent(){
        return view('parent.create-student');
    }
    public function meetings_all(){
        $students = ParentStudent::where('parent_id',auth()->id())->get();
        return view('parent.meetings_all')
            ->with('students',$students);
    }
    public function meetings_student($student_id){
        $now = Carbon::now();
      
         $group_sessions = GroupSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();

        $mentoring_sessions = MentoringSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();
       
        $coaching_sessions = CoachingSession::where(function ($query) use ($now) {
                $query->where('date', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('date', $now->toDateString())
                            ->where('start', '>', $now->toTimeString());
                    });
        })->get();

        $user_group_sessions = UserGroupSession::where('user_id',auth()->id())->pluck('session_id')->toArray();
        $user_mentoring_sessions = UserMentoringSession::where('user_id',auth()->id())->pluck('session_id')->toArray();
        $user_coaching_sessions = UserCoachingSessions::where('user_id',auth()->id())->pluck('session_id')->toArray();
        
        $permissions = $this->checkPermissionForSessionBooking($student_id);
      
        return view('parent.meetings')
            ->with('group_sessions',$group_sessions)
            ->with('user_group_sessions',$user_group_sessions)
            ->with('mentoring_sessions',$mentoring_sessions)
            ->with('user_mentoring_sessions',$user_mentoring_sessions)
            ->with('user_coaching_sessions',$user_coaching_sessions)
            ->with('permissions',$permissions)
            ->with('coaching_sessions',$coaching_sessions)
            ->with('student_id',$student_id);
    }

    public function checkPermissionForSessionBooking($student_id){
        $coaching_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',14)->count() > 0){
            $coaching_sessions_permission = true;
        }
        $mentoring_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',13)->count() > 0){
            $mentoring_sessions_permission = true;
        }
        $group_sessions_permission = false;
        if(AdditionalCourse::where('status',0)->where('student_id',$student_id)->where('course_type',12)->count() > 0){
            $group_sessions_permission = true;
        }
        $permissions = [
            'coaching' => $coaching_sessions_permission,
            'mentoring' => $mentoring_sessions_permission,
            'group' => $group_sessions_permission
        ];
        return $permissions;
    }

    public function addStudent(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'date_of_birth' => 'required',
            'education_option' => 'required'
        ]);

        $education_option = $request->education_option;
        $user = $request->only('name','surname','middlename','email','date_of_birth');
        $password  = Str::random(10);
        $student_role_id = 4;

        $student = User::create([
            'name' => $user['name'],
            'middlename' => $user['middlename'],
            'surname' => $user['surname'],
            'email' => $user['email'],
            'role_id' => $student_role_id,
            'password' => Hash::make($password),
            'date_of_birth' => $user['date_of_birth'],
            'confirmation_code' => Str::random(30),
            'is_verified' => 0,
        ]);

        $status = 0;

        // They don't need document approval for sessions and single course
        if($education_option == 4 || $education_option == 5){
            $status = 3;
        }
        ParentStudent::create([
            'parent_id' => auth()->user()->id,
            'student_id'=> $student->id,
            'status' => $status,
            'is_disabled' => 0,
            'track' => $education_option
        ]);
        try{
            Mail::to($student->email)->send(new StudentCredentials($student,$password));
        }catch(\Exception $e){
            info($e->getMessage());
        }
        if($education_option == 1 || $education_option == 2 || $education_option == 3){
            return redirect()->route('parent.student.documents',$student->id);
        }
        elseif($education_option==4){
             return redirect()->route('parent.student.module.courses',$student->id);
        }
        elseif($education_option==5){
             return redirect()->route('parent.student.sessions',$student->id);
        }
        else{
            return;
        }
       
    }

    public function studentDocuments($student_id){
        $student = User::find($student_id);
        return view('parent.student-documents')
                ->with('student',$student);
    }

    public function studentDocumentsSubmit(Request $request){
        #!!! Note student ID is type of document don't mix with student->id 
        $validation_rules = [
            // Required documents  
            'id' => 'required', #user id
            'parent_id'          => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'custody_document'   => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'proof_of_residence' => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'student_id'         => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'birth_certificate'  => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'school_transcript'  => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],

            // Optional documents
            'withdrawal_confirmation' => ['nullable', 'file', 'mimetypes:application/pdf', 'max:5120'],
            'iep'                     => ['nullable', 'file', 'mimetypes:application/pdf', 'max:5120'],
        ];

        $validation_messages = [
            '*.mimetypes' => 'All documents must be valid PDF files.',
            '*.max'       => 'Each document must not exceed 5MB.',
        ];

        $student_id = $request->id;
        $student = User::find($student_id);

        #!!! Only track 1 and 2 needs grade 
        if($student->student_details->track == 1 || $student->student_details->track == 2){
            $validation_rules['grade'] = 'required';
        }
        
        $request->validate($validation_rules,$validation_messages);
        $grade = $request->grade;
        ParentStudent::where('student_id',$student_id)->first()->update([ 'grade'=>$grade ]);

        $path = base_path()."/public/documents/".$student->id;
        #Parent Id (document 1) required
        $parent_id_name = $this->upload_file($request->file('parent_id'),$path);
        StudentDocument::insert(['file'=>$parent_id_name,'type'=>1,'student_id'=>$student->id,'is_approved' => 0]);
        
        #custody_document (document 2) required
        $custody_document_name = $this->upload_file($request->file('custody_document'),$path); 
        StudentDocument::insert(['file'=>$custody_document_name,'type'=>2,'student_id'=>$student->id,'is_approved' => 0]);

        #proof_of_residence (document 3) required
        $proof_of_residence_name =  $this->upload_file($request->file('proof_of_residence'),$path); 
        StudentDocument::insert(['file'=>$proof_of_residence_name,'type'=>3,'student_id'=>$student->id,'is_approved' => 0]);

        #student id (document 4) required
        $student_id_name =  $this->upload_file($request->file('student_id'),$path); 
        StudentDocument::insert(['file'=>$student_id_name,'type'=>4,'student_id'=>$student->id,'is_approved' => 0]);

        #birth certificete (document 5) required
        $birth_certificate_name =    $this->upload_file($request->file('birth_certificate'),$path); 
        StudentDocument::insert(['file'=>$birth_certificate_name,'type'=>5,'student_id'=>$student->id,'is_approved' => 0]);

        #school transcript (document 6) required
        $school_transcript_name =$this->upload_file($request->file('school_transcript'),$path); 
        StudentDocument::insert(['file'=>$school_transcript_name,'type'=>6,'student_id'=>$student->id,'is_approved' => 0]);

        #withdrawal_confirmation (document 7) optinal
        if($request->hasFile('withdrawal_confirmation')){
            $withdrawal_confirmation_name =  $this->upload_file($request->file('withdrawal_confirmation'),$path); 
            StudentDocument::insert(['file'=>$withdrawal_confirmation_name,'type'=>7,'student_id'=>$student->id,'is_approved' => 0]);
        }
        
         #withdrawal_confirmation (document 8) optinal
        if($request->hasFile('iep')){
            $iep_name =  $this->upload_file($request->file('iep'),$path); 
            StudentDocument::insert(['file'=>$iep_name,'type'=> 8,'student_id'=>$student->id,'is_approved' => 0]);
        }

        return redirect()->route('application-fee',$student->id);
    }

    public function studentModuleCourses($student_id){
        $student = User::find($student_id);
        $course_types = $this->student_module_course_service->get_courses();
        $total = $this->student_module_course_service->calculate_total();
       
        return view('parent.student-module-courses')
            ->with('student',$student)
            ->with('total',$total)
            ->with('course_types',$course_types);
    }
    public function changeCourseTypeCount($course_id,$action){
        $current_count = Cookie::get('course-type-count-'.$course_id);
        $new_count = $action == 'increase' ? $current_count++ : $current_count--;
        if($current_count >= 1){
             Cookie::queue('course-type-count-'.$course_id, $current_count, 60);
        }
        return redirect()->back()->with('success_message','Courses count updated successfully');
    }

    public function studentCourseTypeCheckout($student_id){
        $student = User::find($student_id);
        $course_types = $this->student_module_course_service->get_courses();
        $total = $this->student_module_course_service->calculate_total();
         return view('parent.student-module-courses-checkout')
            ->with('student',$student)
            ->with('total',$total)
            ->with('course_types',$course_types);
    }

    public function studentSessions($student_id){
        $student = User::find($student_id);
        $sessions = $this->student_sessions_service->get_sessions();
        $total = $this->student_sessions_service->calculate_total();
        return view('parent.student-sessions')
            ->with('total',$total)
            ->with('sessions',$sessions)
            ->with('student',$student);
    }
    public function changeSessionCount($session_id,$action){
        $current_count = Cookie::get('session-count-'.$session_id);
        $new_count = $action == 'increase' ? $current_count++ : $current_count--;
        if($current_count >= 1){
             Cookie::queue('session-count-'.$session_id, $current_count, 60);
        }
        return redirect()->back()->with('success_message','Session count updated successfully');
    }

    public function studentSessionsCheckout($student_id){
        $student = User::find($student_id);
        $sessions = $this->student_sessions_service->get_sessions();
        $total = $this->student_sessions_service->calculate_total();
        return view('parent.session-checkout')
            ->with('total',$total)
            ->with('sessions',$sessions)
            ->with('student',$student);
    }
     public function applicationFee($student_id){

        $application_fee = 150;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Application fee',
                        ],
                        'unit_amount'  =>  $application_fee*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('application-fee-success',$student_id),
            'cancel_url'  => route('parent.student.documents',$student_id),
        ]);
        return redirect()->away($session->url);
    }
    public function applicationFeeSuccess($student_id){
        $application_fee = 150;
        
        ParentStudent::where('student_id',$student_id)->update(['status' => 1]);
        $this->createInvoice($application_fee,'Application Fee');

        try{
            Mail::to(auth()->user()->email)->send(new StudentCreated);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
             Mail::to('mathias.kunze@onsites.com')->send(new StudentCreatedAdmin);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        // try{
        //     Mail::to($user->email)
        // }catch(\Exception $e){

        // }
        session()->forget('student_data');
        return redirect()->route('parent.student.profile',$student_id);
    }

    public function payments(){
        $student_ids = ParentStudent::where('parent_id',auth()->user()->id)->pluck('student_id');
        $student_plans = StudentPlan::whereIn('student_id',$student_ids)->get();
        return view('parent.payments')
            ->with('student_plans',$student_plans);
    }

    public function enrollmentFee($student_id,$plan_id,$payment_type){

        $enrollment_fee = 300;
        $plan = Plan::find($plan_id);
        $plan_price = $payment_type == 0 ? $plan->price_per_month : $plan->price_per_year;
        $period = $payment_type == 0 ? 'per month' : 'per year';
        $amount = $plan_price + $enrollment_fee;
        $enrollment_fee_status = 2;
        $invoice_description = 'Enrollment fee and '.$plan->name. ' package ('. $period .')';

        $student_data = [
            'student_id' => $student_id,
            'status' => $enrollment_fee_status,
            'plan_id' => $plan_id,
            'payment_type' => $payment_type //montly => 0 , yearly => 1
        ];
        $invoice_data = [
            'description' => $invoice_description,
            'amount' => $amount
        ];
        
        session()->put('student_data',$student_data);
        session()->put('invoice_data',$invoice_data);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $invoice_description,
                        ],
                        'unit_amount'  => $amount*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('enrollment-fee-success'),
            'cancel_url'  => route('parent.student.profile',$student_id),
        ]);
        
        return redirect()->away($session->url);
    }
    public function enrollmentFeeSuccess(){
       $invoice_data = session()->get('invoice_data');
       $student_data = session()->get('student_data');

       $exprires_at = $student_data['payment_type'] == 0  
                ? Carbon::now()->addMonths(1)->subDays(1) 
                : Carbon::now()->addYears(1)->subDays(1); // monthly or yearly
        StudentPlan::insert([
            'plan_id' => $student_data['plan_id'],
            'student_id' => $student_data['student_id'],
            'expires_at' => $exprires_at,
            'created_at' => Carbon::now()
        ]);

        $this->insertAdditionalCourses($student_data['plan_id'],$student_data['student_id']);

        $this->createInvoice($invoice_data['amount'],$invoice_data['description']);

        ParentStudent::where('student_id',$student_data['student_id'])
            ->update(['status' => 3]);

         try{
            Mail::to(auth()->user()->email)->send(new PaymentSuccessfull);
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->route('parent.student.profile',$student_data['student_id']);
    }

    public function insertAdditionalCourses($plan_id,$student_id){
        // Note SAT == ACT , 
        //Corespondent to features table
        //Courses
        $psat = $plan_id > 1 ?  1 : 1;
        $sat = $plan_id > 1 ? 1 : 1;
        $ap = 0;
        $clep =0;
        $cte = 0;
        $esol = 0;
        //Sessions
        $group_sessions = 0;
        $mentoring_sessions = 0;
        $coaching_sessions = 0;

        if($plan_id == 2){
            $ap = 1;
            $clep =1;
            $cte = 2;
            $esol = 0;
            $group_sessions = 1;
        }
        elseif($plan_id == 3){
            $ap = 2;
            $clep =2;
            $cte = 4;
            $esol = 1;
            $group_sessions = 1;
            $mentoring_sessions = 1;
            $coaching_sessions = 1;
        }

        for($i=0;$i < $psat; $i++){
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 7,
                'status' => 0 // not enrolled
            ]);
        }
        for($i=0;$i < $sat; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 8,
                'status' => 0 // not enrolled
            ]);
        }
        for($i=0;$i < $ap; $i++){
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 3,
                'status' => 0 // not enrolled
            ]);
        }
        for($i=0;$i < $clep; $i++){
            AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 5,
                'status' => 0 // not enrolled
            ]);
        }
        for($i=0;$i < $cte; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 4,
                'status' => 0 // not enrolled
            ]);
        }
        for($i=0;$i < $esol; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 6,
                'status' => 0 // not enrolled
            ]);
        }
         for($i=0;$i < $group_sessions; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 12,
                'status' => 0 // not enrolled
            ]);
        }
         for($i=0;$i < $mentoring_sessions; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 13,
                'status' => 0 // not enrolled
            ]);
        }
         for($i=0;$i < $coaching_sessions; $i++){
             AdditionalCourse::insert([
                'student_id' => $student_id,
                'course_type' => 14,
                'status' => 0 // not enrolled
            ]);
        }
    }

    public function extendPlan(Request $request,$student_id){
        $plan_id = $request->plan;
        $payment_type = $request->payment_type;
        $plan = Plan::find($plan_id);
        $plan_price = $payment_type == 0 ? $plan->price_per_month : $plan->price_per_year;
        $period = $payment_type == 0 ? 'per month' : 'per year';
        $enrollment_fee_status = 2;
        $invoice_description = $plan->name. ' package ('. $period .')';
        $student_data = [
            'student_id' => $student_id,
            'status' => $enrollment_fee_status,
            'plan_id' => $plan_id,
            'payment_type' => $payment_type //montly => 0 , yearly => 1
        ];
        $invoice_data = [
            'description' => $invoice_description,
            'amount' => $plan_price
        ];

        session()->put('student_data',$student_data);
        session()->put('invoice_data',$invoice_data);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $invoice_description,
                        ],
                        'unit_amount'  => $plan_price*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('extend-plan-success'),
            'cancel_url'  => route('parent.student.profile',$student_id),
        ]);
        
        return redirect()->away($session->url);
    } 

    public function studentSessionsPay($student_id){

        $student = User::find($student_id);
        $sessions = CourseType::where('type',3)->get();
        $total = $this->student_sessions_service->calculate_total();
        
         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Sessions payment',
                        ],
                        'unit_amount'  => $total*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('session-pay-success',$student_id),
            'cancel_url'  => route('parent.student.sessions.checkout',$student_id),
        ]);

         return redirect()->away($session->url);
    }

     public function studentCourseTypePay($student_id){

        $student = User::find($student_id);
        $courses = CourseType::where('type',2)->get();
        $total = $this->student_module_course_service->calculate_total();
        
         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Sessions payment',
                        ],
                        'unit_amount'  => $total*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.courses-type-pay-success',$student_id),
            'cancel_url'  => route('parent.student.course-type.checkout',$student_id),
        ]);

         return redirect()->away($session->url);
    }

    public function extendPlanSuccess(){
       $invoice_data = session()->get('invoice_data');
       $student_data = session()->get('student_data');
       $previous_plan = StudentPlan::where('student_id',$student_data['student_id'])->orderBy('expires_at','desc')->first();
      
       $exprires_at = $student_data['payment_type'] == 0  
                ? Carbon::parse($previous_plan->expires_at)->addMonths(1)->subDays(1) 
                : Carbon::parse($previous_plan->expires_at)->addYears(1)->subDays(1); // monthly or yearly
        StudentPlan::insert([
            'plan_id' => $student_data['plan_id'],
            'student_id' => $student_data['student_id'],
            'expires_at' => $exprires_at,
            'created_at' => Carbon::now()
        ]);

        $this->createInvoice($invoice_data['amount'],$invoice_data['description']);

        ParentStudent::where('student_id',$student_data['student_id'])->update(['status' => $student_data['status']]);

         try{
            Mail::to(auth()->user()->email)->send(new PaymentSuccessfull);
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->route('parent.create.student');
    }

    public function invoices(){
        $invoices = Invoice::where('user_email',auth()->user()->email)->paginate(10);
        return view('parent.invoices')
            ->with('invoices',$invoices);
    }

    public function singleInvoice($id) {
        $invoice = Invoice::where('id', $id)->first();
        return view('parent.single-invoice')->with('invoice', $invoice);
    }
    
    public function studentProfile($student_id){
        $status = ParentStudent::where('student_id',$student_id)->first()->status;
        if($status == 0){
            return redirect()->route('parent.student.documents',$student_id);
        }
        $student = User::find($student_id);
        $plans = Plan::all();
        $active_plan = StudentPlan::where('student_id',$student_id)->first();
        return view('parent.student-profile')
            ->with('active_plan',$active_plan)
            ->with('student',$student)
            ->with('plans',$plans)
            ->with('status',$status);
    }

    public function parentPayPlan(Request $request, $student_id){
         $payment_type = $request->payment_type; # 0 => monthly 1 => yearly
         $plan_id = $request->plan;
         return redirect()->route('enrollment-fee',[$student_id,$plan_id,$payment_type]);
    }

    public function profile(){
        $countries = Country::all();
        return view('parent.profile')
        ->with('countries',$countries);
    }

    public function updateInfo(Request $request){
        $request->validate([
            "email" => 'required',
            'country_id'=> 'required',
            'city' => 'required',
            'street' => 'required',
            'street_number' => 'required',
            'zip' => 'required',
            "phone" => "required|regex:/^[1-9]\d{7,14}$/",
        ]);
        $user = $request->email;
        if(auth()->user()->email != $request->email){
            if(User::where('email',$request->email)->count() > 0){
                return redirect()->back()->with('error','Email has already been taken');
            }
        }
        $details = $request->only('city','street','street_number','zip','country_id','phone');
        $details['user_id'] = auth()->id();
        InvoiceDetail::updateOrCreate(['user_id'=>auth()->user()->id],$details);
        return redirect()->back()->with('success_message','User info updated successfully');
    }

    public function reuploadDocuments(Request $request,$student_id){
        $student = User::find($student_id);
        $documents = $request->documents;
        $types = $request->types;
        $path = base_path()."/public/documents/".$student->id;
       
        foreach($documents as $key => $document){
             $old_document = StudentDocument::where('type',$types[$key])->where('student_id',$student_id)->first();
             try{
                unlink($path.'/'.$old_document->file);
             }catch(\Exception $e){
                info($e->getMessage());
             }
             $old_document->delete();
             $filename = $this->upload_file($document,$path);
             StudentDocument::insert([
                'file'=>$filename,
                'type'=> $types[$key],
                'student_id'=>$student->id,
                'is_approved' => 0
            ]);
            ParentStudent::where('student_id',$student_id)->first()->update(['status' => 1]);
        }
        try{
            Mail::to('mathias.kunze@onsites.com')->send(new ParentReuploadDocument);
        }catch(\Excetpion $e){
                info($e->getMessage());
        }
         return redirect()->back();
    }

    public function requestFamilyConsultation(Request $request){

        $parent  = User::find($request->parent_id);

        FamilyConsultationRequestModel::create(['parent_id' => $parent->id,'status' => 0]);

        try{
            Mail::to($parent->email)->send(new FamilyConsultationRequest);
        }catch(\Exception $e){
            info($e->getMessage());
        }

         try{
            Mail::to('mathias.kunze@onsites.com')->send(new FamilyConsultationRequestAdmin($parent));
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->back()->with('success_message','Your request has been placed successfully');
    }
    public function confirmMeeting(Request $request,$meeting_id){
        $meeting = FamilyConsultation::find($meeting_id);
        $request = FamilyConsultationRequestModel::find($meeting->request_id);
        $request->update(['status' => 1]);
        FamilyConsultation::where('id','!=',$meeting->id)->where('request_id',$request->id)->delete();
        return redirect()->back()->with('success_message','Your confirmation');
    }

    public function sendInquiry(Request $request){
        $inquiry = $request->only('title','message');
        $inquiry['ticket'] = $this->unique_code(20);
        $inquiry['user_id'] = auth()->user()->id;
       
    }

    public function studentCourseTypeSuccess($student_id){
        $this->student_module_course_service->recordCourses($student_id);
        $amount = $this->student_module_course_service->calculate_total();
        $description = 'Single course service';
        $this->createInvoice($amount,$description);
        return redirect()->route('parent.student.profile',$student_id); #Note the same view
    }
    public function studentSessionsSuccess($student_id){
        $this->student_sessions_service->recordSesssions($student_id);
        $amount = $this->student_sessions_service->calculate_total();
        $description = 'Services for group/mentoring/coaching sessions';
        $this->createInvoice($amount,$description);
        return view('parent.student-sessions-success');
    }

    public function  bookGroupSession($session_id){
       $user_id = auth()->user()->id;
       UserGroupSession::insert([
            'user_id' => $user_id,
            'session_id' => $session_id
       ]);
       //TODO:: mails

       return redirect()->route('book-session-success')->with('success_message','The group session booked successfully');
    }

    public function  bookMentoringSession($session_id){
       $user_id = auth()->user()->id;
       UserMentoringSession::insert([
            'user_id' => $user_id,
            'session_id' => $session_id
       ]);

       //TODO:: mails

       return redirect()->route('book-session-success')->with('success_message','The group session booked successfully');
    }

    public function bookSessionSuccess(){
        return view('parent.book-session-success');
    }

    public function enroll(Request $request,$course_id){
       
        $curriculum_course = CurriculumCourse::with('course')->find($course_id);
        
        $parent = auth()->user();
        $student = User::with('active_plan')->find($request->student_id);

        #Check if they enroll NOT Core or elective courses (1 and 2) or it is TRANSFER PROGRAM (11)
        if($curriculum_course->curriculum_type_id != 1 && $curriculum_course->curriculum_type_id != 2 && $curriculum_course->curriculum_type_id != 11 ){
           $additional_course = AdditionalCourse::where('course_type',$curriculum_course->curriculum_type_id)
            ->where('student_id',$student->id)
            ->first();
            if($additional_course){
                $additional_course->update(['status' => 1]);
            }
            else{
                
                return redirect()->back()->with('error','You don\'t have permission to enroll this course');
            }
        }
        
        StudentEnrolledCourse::insert([
            'user_id' => $student->id,
            'catalog_course_id' => $curriculum_course->id,
            'created_at' => Carbon::now(),
            'status' => StudentEnrolledCourse::STATUS_ENROLLED
        ]);

        try{
            Mail::to($parent->email)->send(new CourseEnrolledParent($parent,$student,$curriculum_course));
        }catch(\Exception $e){
            info($e->getMessage());
        }

        try{
             Mail::to($student->email)->send(new CourseEnrolledStudent);
        }catch(\Exception $e){
            info($e->getMessage());
        }


        return redirect()->back()->with('success_message','The course has been enrolled successfully');
    }

    public function updateEnrolledCourseStatus($enrolled_course_id){
        $enrolled_course = StudentEnrolledCourse::find($enrolled_course_id);
        #Start Study
        if($enrolled_course->status == 0){
            $enrolled_course->update(['status' => StudentEnrolledCourse::STATUS_START_STUDY]);
            $message = 'Student is ready for studing';
        }
        #Ready For Exam
        elseif($enrolled_course->status == 1){
            $enrolled_course->update(['status' => StudentEnrolledCourse::STATUS_READY_FOR_EXAM]);
            $message = 'Student is ready for exam';
            try{
                Mail::to('mathias.kunze@onsites.com')->send(new StudentReadyForExam($enrolled_course));
            }catch(\Exception $e){
                info($e->getMessage());
            }
            
        }
        return redirect()->back()->with('success_message',$message);
    }

    public function transferProgramPay(Request $request, $student_id){
       
        $student = User::find($student_id);
        $enrollement_fee = 300;
        $type = $request->type;
        $program_fee = $type == 1 ? 1900 : 190;
        $total = $enrollement_fee + $program_fee;
        
         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Sessions payment',
                        ],
                        'unit_amount'  => $total*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.transfer-pay-success',[$student_id,$type]),
            'cancel_url'  => route('parent.student.profile',$student_id),
        ]);

         return redirect()->away($session->url);
    }

    public function transferProgramPaySuccess($student_id,$type){

        $student = User::find($student_id);
        $enrollement_fee = 300;
        $program_fee = $type == 1 ? 1900 : 190;
        $total = $enrollement_fee + $program_fee;
        
        $this->createInvoice($total,'Transfer program enrollment');

        $expires_at = $type == 1 
                ? Carbon::now()->addMonths(1)->subDays(1) 
                : Carbon::now()->addYears(1)->subDays(1); 
        ParentStudent::where('student_id',$student_id)
            ->update(['status' => 3]);

        StudentPlan::insert([
            'plan_id' => 4,
            'student_id' => $student_id,
            'expires_at' => $expires_at
        ]);

        return redirect()->route('parent.student.profile',$student_id);
    }

    public function resetPassPage() {
        
        return view('parent.reset-password');
    }

    public function requestLeavePage() {
        $children = User::where('id', auth()->user()->id)->with('students')->get();

        return view('parent.request-leave')->with('children', $children);
    }

    public function requestLeave(Request $request) {
        $request->validate([
            'leave_type' => 'required|integer',
            'file' => 'required|file|max:2048',
            'message' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $path = base_path()."/public/documents/leave_requests/";
        $file = $this->upload_file($request->file('file'), $path);

        LeaveRequest::create([
            'student_id' => $request->student_id,
            'type'       => $request->leave_type,
            'file'       => $file,
            'message'    => $request->message,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'status'     => LeaveRequest::STATUS_PENDING
        ]);

        Notification::add(
            auth()->id(),
            'Leave request submitted successfully!'
        );
        Notification::addForAdmins('New leave request submitted.');

        return redirect()->back()->with('success_message', 'Leave request submitted successfully!');
    }

    public function showNotifications() {
        // Mark all unread as read WHEN opening the page
        Notification::where('user_id', auth()->id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        // Load notifications
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->paginate(20);

        return view('parent.all-notifications')->with('notifications', $notifications);
    }
}

