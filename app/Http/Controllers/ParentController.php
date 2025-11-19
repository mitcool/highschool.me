<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Meeting;
use App\User;
use App\ParentStudent;
use App\Plan;
use App\StudentDocument;
use App\InvoiceDetail;
use App\Country;
use App\Invoice;

use Mail;

use App\Mail\StudentCreated;
use App\Mail\StudentCredentials;
use App\Mail\StudentCreatedAdmin;
use App\Mail\PaymentSuccessFull;

use Carbon\Carbon;

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
    public function dashboard(){
        return view('parent.dashboard');
    }
    public function createStudent(){
        return view('parent.create-student');
    }
    public function meetings(){
        $meetings = Meeting::where('parent_id',auth()->id())->get();
        return view('parent.meetings')
            ->with('meetings',$meetings);
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
         $data = $request->only('name','surname','email','grade','date_of_birth');
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
        StudentDocument::insert(['file'=>$parent_id_name,'type'=>1,'student_id'=>$student->id]);
        
        #custody_document (document 2) required
        $custody_document_name = $this->upload_file($request->file('custody_document'),$path); 
        StudentDocument::insert(['file'=>$custody_document_name,'type'=>2,'student_id'=>$student->id]);

        #proof_of_residence (document 3) required
        $proof_of_residence_name =  $this->upload_file($request->file('proof_of_residence'),$path); 
        StudentDocument::insert(['file'=>$proof_of_residence_name,'type'=>3,'student_id'=>$student->id]);

        #student id (document 4) required
        $student_id_name =  $this->upload_file($request->file('student_id'),$path); 
        StudentDocument::insert(['file'=>$student_id_name,'type'=>4,'student_id'=>$student->id]);

        #birth certificete (document 5) required
        $birth_certificate_name =    $this->upload_file($request->file('birth_certificate'),$path); 
        StudentDocument::insert(['file'=>$birth_certificate_name,'type'=>5,'student_id'=>$student->id]);

        #school transcript (document 6) required
        $school_transcript_name = $request->file('school_transcript')->move(base_path()."/public/documents/".$student->id, $student_id_name);
        StudentDocument::insert(['file'=>$school_transcript_name,'type'=>6,'student_id'=>$student->id]);

        #withdrawal_confirmation (document 7) optinal
        if($request->hasFile('withdrawal_confirmation')){
            $withdrawal_confirmation_name =  $this->upload_file($request->file('withdrawal_confirmation'),$path); 
            StudentDocument::insert(['file'=>$withdrawal_confirmation_name,'type'=>7,'student_id'=>$student->id]);
        }
        
         #withdrawal_confirmation (document 8) optinal
        if($request->hasFile('iep')){
            $iep_name =  $this->upload_file($request->file('iep'),$path); 
            StudentDocument::insert(['file'=>$iep_name,'type'=> 8,'student_id'=>$student->id]);
        }

        #ParentStudent::where('parent_id','student_id')->delete();
        ParentStudent::insert([
            'student_id' => $student->id,
            'parent_id' => auth()->id(),
            'status' => 0, #pending application fee payment,
            'grade' => $data['grade'],
            'date_of_birth' => Carbon::parse($data['date_of_birth'])
        ]);
        
        try{
            Mail::to(auth()->user()->email)->send(new StudentCreated);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
            Mail::to($data['email'])->send(new StudentCredentials);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        try{
             Mail::to($data['email'])->send(new StudentCreatedAdmin);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->route('application-fee',$student->id);
    }

    public function payments(){
        return view('parent.payments');
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

    public function updateStudentStatus($status,$student_id,$invoice_description,$amount,$payment_type = null){
        $parent_student = [];
        if(isset($payment_type)){
            $exprires_at = $payment_type == 0  
                ? Carbon::now()->addMonths(1) 
                : Carbon::now()->addYears(1); // monthly or yearly
               
            StudentPlan::insert([
                'plan_id' => $plan_id,
                'student_id' => $student_id,
                'expires_at' => $exprires_at,
                'payment_period' => $payment_type
            ]);
        }
        $parent_student['status'] = $status;
      
        ParentStudent::where('student_id',$student_id)->update($parent_student);

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
            'description' => $invoice_description
        ]);

        try{
            Mail::to(auth()->user()->email)->send(new PaymentSuccessFull);
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->route('parent.create.student')
            ->with('success_message','Payment successfull');
    }

    public function studentProfile($student_id){
        $status = ParentStudent::where('student_id',$student_id)->first()->status;
        $student = User::find($student_id);
        $plans = Plan::all();
        return view('parent.student-profile')
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
}
