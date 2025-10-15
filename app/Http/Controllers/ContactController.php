<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;

use App\Subscriber;
use App\GeneralRequest as GeneralRequestModel;
use App\PhoneRequest;
use App\FreeFactRequest;
use App\ProgramRequest;

use App\Http\Requests\GeneralRequest;
use App\Http\Requests\PhoneContactRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ProgramContactRequest;

use App\Mail\GeneralRequestMail;
use App\Mail\PhoneContact;
use App\Mail\Contact;
use App\Mail\SendRequestForProgram;

class ContactController extends Controller
{
    
    public $mathias_email;
    public $company_email;

    function __construct(){
        $this->mathias_email = 'mathias.kunze@onsites.com';
        $this->company_email = 'graduate@graduate.me';
    }

    // Request from /student-assistance-team page
    public function generalRequest (GeneralRequest $request){
        if($request->name || $request->email || $request->age){
            return;
        }
        $data = $request->validated();

        //create subscriber 
        if(Subscriber::where('email',$data['email_request'])->count()==0){
            $subscriber['name'] = $request->name_request;
            $subscriber['email'] = $request->email_request;
            $subscriber['lang'] = session()->get('applocale') == 'de' ? 0 : 1;
            $subscriber['is_active'] = 1;
			      $subscriber['code'] = Str::random(30);
            Subscriber::create($subscriber);
        }

        $general_request  = $request->only('subject','request_type','message');
        $general_request['name'] = $request->name_request;
        $general_request['email'] = $request->email_request;
        //save request to db
        GeneralRequestModel::create($general_request);

        try{
            Mail::to($this->mathias_email)->send(new GeneralRequestMail($data));
        }catch(Exception $e){
            info($e->getMessage());
        }
        
        try{
          Mail::to($this->company_email)->send(new GeneralRequestMail($data));
      }catch(Exception $e){
          info($e->getMessage());
      }
        $message = session()->get('applocale') == 'en' 
                ? 'Your message has been sent successfully.<br>
        We will reply shortly.' 
                : 'Deine Nachricht wurde erfolgreich versendet.<br>
        Wir antworten in Kürze.';
        return redirect()->back()->with('success_message',$message);
    }

    // Request from phone icon on the bottom right
    public function sendPhoneContact(PhoneContactRequest $request){
        if($request->age !== null || $request->username !== null || $request->address !== null){
          return;
        }
        $input = $request->validated();
        //create subscriber
        if(Subscriber::where('email',$input['email'])->count()==0){
          $subscriber = $request->only('name','email');
          $subscriber['lang'] = session()->get('applocale') == 'de' ? 0 : 1;
          $subscriber['is_active'] = 1;
		  $subscriber['code'] = Str::random(30);
          Subscriber::create($subscriber);
        }
        //insert request in db
        $phone_request = $request->only('name','email','phone_code','phonenumber','hour');
        PhoneRequest::create($phone_request);
    
        try{
          Mail::to($this->company_email)->send(new PhoneContact($input));
          
        }
        catch(Exception $e){
    
          info($e->getMessage());
        }

        try{
          Mail::to($this->mathias_email)->send(new PhoneContact($input));
          
        }
        catch(Exception $e){
    
          info($e->getMessage());
        }
        return redirect()->back()->with('success_message','Request Succesfully sent!');
      }

      //Home page contact form "FREE FactSheet"
      public function sendContact(ContactRequest $request){
        if($request->name || $request->address || $request->age){
          return;
        }
        $mail_info = $request->validated();
        if(Subscriber::where('email',$mail_info['email'])->count()==0){
            $subscriber = $request->only('email');
            $subscriber['name'] = $request->firstname.' '.$request->surname;
            $subscriber['lang'] = session()->get('applocale') == 'de' ? 0 : 1;
            $subscriber['is_active'] = 1;
			$subscriber['code'] = Str::random(30);
            Subscriber::create($subscriber);
        }
        FreeFactRequest::create($request->validated());
        try{
          Mail::to($this->company_email)->send(new Contact($mail_info));
        }catch(Exception $e){
          info($e->getMessage());
        }

        try{
          Mail::to($this->mathias_email)->send(new Contact($mail_info));
        }catch(Exception $e){
          info($e->getMessage());
        }
        return redirect()->back()->with('success_message','Request Succesfully sent!');
    }

    public function sendRequestForProgram(ProgramContactRequest $request) {
    
      if($request->first_name !== null || $request->address !== null || $request->age !== null){
        return;
      }
      $program_request = $request->validated();
      if(Subscriber::where('email',$program_request['mail'])->count()==0){
          $subscriber =[];
          $subscriber['name'] = $request->name.' '.$request->lastname;
          $subscriber['email'] = $request->mail;
          $subscriber['lang'] = session()->get('applocale') == 'de' ? 0 : 1;
          $subscriber['is_active'] = 1;
		  $subscriber['code'] = Str::random(30);
          Subscriber::create($subscriber);
      }
      ProgramRequest::create($request->only('name','last_name','mail','phonecode','phone_number','program_name','how_did_you_find','communication_language'));
      try {
        Mail::to($this->mathias_email)->send(new SendRequestForProgram($program_request));
        
      }
      catch(Exception $e) {
        info($e);
      }

      try {
        Mail::to($this->company_email)->send(new SendRequestForProgram($program_request));
        
      }
      catch(Exception $e) {
        info($e);
      }
      $message = session()->get('applocale') == 'de'
        ? 'Deine Anfrage wurde erfolgreich versendet.<br>
           Wir antworten in Kürze.'
        : 'Your request has been sent successfully.<br>
           We will reply shortly.' 
        ;
      return redirect()->back()->with('success_message', $message);
    }
  
}
