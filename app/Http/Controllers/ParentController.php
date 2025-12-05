<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Mail;
use Carbon\Carbon;

use App\FamilyConsultation;
use App\User;
use App\ParentStudent;
use App\Plan;
use App\StudentDocument;
use App\InvoiceDetail;
use App\Country;
use App\Invoice;
use App\StudentPlan;
use App\FamilyConsultationRequest as FamilyConsultationRequestModel;

use App\Mail\StudentCreated;
use App\Mail\StudentCredentials;
use App\Mail\StudentCreatedAdmin;
use App\Mail\PaymentSuccessFull;
use App\Mail\ParentReuploadDocument;
use App\Mail\FamilyConsultationRequest;
use App\Mail\FamilyConsultationRequestAdmin;


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
    public function dashboard(){
        return view('parent.dashboard');
    }
    public function createStudent(){
        return view('parent.create-student');
    }
    public function meetings(){
        $family_consultations_requests = FamilyConsultationRequestModel::where('parent_id',auth()->user()->id)->get();
        return view('parent.meetings')
            ->with('family_consultations_requests',$family_consultations_requests);
    }

    public function addStudent(Request $request){
         
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'parent_id' => 'required|max:5000',
            'custody_document' => 'required|max:5000',
            'proof_of_residence' => 'required|max:5000',
            'student_id' => 'required|max:5000',
            'birth_certificate' => 'required|max:5000',
            'school_transcript' => 'max:5000',
            'withdrawal_confirmation' => 'max:5000',

        ]);

         $data = $request->only('name','surname','email');
         $student_data = $request->only('grade','date_of_birth','email');
         $password  = Str::random(10);
         $student_role_id = 4;

         $student = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'role_id' => $student_role_id,
            'password' => Hash::make($password),
        ]);

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
        $school_transcript_name = $request->file('school_transcript')->move(base_path()."/public/documents/".$student->id, $student_id_name);
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
        session()->put('student_data',$student_data);
        return redirect()->route('application-fee',$student->id);
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
            'cancel_url'  => route('parent.create.student'),
        ]);
        return redirect()->away($session->url);
    }
    public function applicationFeeSuccess($student_id){
        $application_fee = 150;
        $student_data = session()->get('student_data');
        ParentStudent::insert([
            'student_id' => $student_id,
            'parent_id' => auth()->id(),
            'status' => 0,
            'grade' => $student_data['grade'],
            'date_of_birth' => Carbon::parse($student_data['date_of_birth'])
        ]);
        $this->createInvoice($application_fee,'Application Fee');

        try{
            Mail::to(auth()->user()->email)->send(new StudentCreated);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
            Mail::to($student_data['email'])->send(new StudentCredentials);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
             Mail::to('mathias.kunze@onsites.com')->send(new StudentCreatedAdmin);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        session()->forget('student_data');
        return redirect()->route('parent.create.student');
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
                ? Carbon::now()->addMonths(1) 
                : Carbon::now()->addYears(1); // monthly or yearly
        StudentPlan::insert([
            'plan_id' => $student_data['plan_id'],
            'student_id' => $student_data['student_id'],
            'expires_at' => $exprires_at,
            'created_at' => Carbon::now()
        ]);

        $this->createInvoice($invoice_data['amount'],$invoice_data['description']);

        ParentStudent::where('student_id',$student_data['student_id'])
            ->update(['status' => $student_data['status']]);

         try{
            Mail::to(auth()->user()->email)->send(new PaymentSuccessFull);
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->route('parent.create.student');
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


    public function extendPlanSuccess(){
       $invoice_data = session()->get('invoice_data');
       $student_data = session()->get('student_data');
       $previous_plan = StudentPlan::where('student_id',$student_data['student_id'])->orderBy('expires_at','desc')->first();
      
       $exprires_at = $student_data['payment_type'] == 0  
                ? Carbon::parse($previous_plan->expires_at)->addMonths(1) 
                : Carbon::parse($previous_plan->expires_at)->addYears(1); // monthly or yearly
        StudentPlan::insert([
            'plan_id' => $student_data['plan_id'],
            'student_id' => $student_data['student_id'],
            'expires_at' => $exprires_at,
            'created_at' => Carbon::now()
        ]);

        $this->createInvoice($invoice_data['amount'],$invoice_data['description']);

        ParentStudent::where('student_id',$student_data['student_id'])->update(['status' => $student_data['status']]);

         try{
            Mail::to(auth()->user()->email)->send(new PaymentSuccessFull);
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->route('parent.create.student');
    }

    public function invoices(){
        $invoices = Invoice::where('user_email',auth()->user()->email)->get();
        return view('parent.invoices')
            ->with('invoices',$invoices);
    }

    public function singleInvoice($id) {
        $invoice = Invoice::where('id', $id)->first();
        return view('parent.single-invoice')->with('invoice', $invoice);
    }

    public function inquiries(){
        return view('parent.inquiries');
    }

    public function newInquiry(){
        return view('parent.new-inquiry');
    }

    public function studentProfile($student_id){
        $status = ParentStudent::where('student_id',$student_id)->first()->status;
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
        $user = $request->email;
        $details = $request->only('city','street','street_number','zip','country_id');
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
            ParentStudent::where('student_id',$student_id)->first()->update(['status' => 0]);
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
}
