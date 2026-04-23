<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Mail;
use Validator;
use App;
use Session;
use Log;
use Cookie;
use Config;
use DB;
use Auth;
use Carbon\Carbon;

use App\Mail\ContactEmail;
use App\Mail\ApplyConferenceEmail;
use App\Mail\SendForm;
use App\Mail\SendRequestForProgram;
use App\Mail\ReceiveApplication;
use App\Mail\ConfirmationForApplication;
use App\Mail\PhoneContact;
use App\Mail\Contact;
use App\Mail\ContactModal;
use App\Mail\NewHelpDesk;
use App\Mail\VerificationProfile;
use App\Mail\EarlyRegistrationEmail;
use App\Mail\NewHelpDeskAdmin;

use App\Text;
use App\User;
use App\AboutPicture;
use App\FaqCategory;
use App\FaqCategoryTranslation;
use App\Faq;
use App\Academic;
use App\AcademicTranslation;
use App\Partner;
use App\Conference;
use App\ConferenceTranslation;
use App\Company;
use App\Publication;
use App\DepartmentsImage;
use App\HelpDeskVideo;
use App\Route;
use App\Study;
use App\StudyTranslation;
use App\News;
use App\NewsTranslation;
use App\Program;
use App\ProgramTranslation;
use App\Tutorial;
use App\TutorialTranslation;
use App\Image;
use App\ImageAttribute;
use App\Application;
use App\PaymentPeriod;
use App\StudyPeriod;
use App\DynamicNews;
use App\DynamicNewsTranslation;
use App\DynamicNewsAuthorTranslation;
use App\DynamicNewsCategoryTranslation;
use App\DynamicNewsCategory;
use App\FactHub;
use App\FactHubTranslation;
use App\FactHubImageAttribute;
use App\PressRelease;
use App\PressReleaseTranslation;
use App\Course;

use App\Country;
use App\Subscriber;
use App\PhoneRequest;
use App\GeneralRequest;
use App\UnsubscribeReason;
use App\IsoIcon;
use App\Job;
use App\Plan;
use App\FeatureCategory;
use App\Feature;
use App\ContactPage;
use App\HelpDesk;
use App\Notification;
use App\EarlyRegistration;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\AdvisoryRequest;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplyConferenceRequest;
use App\Http\Requests\SendContactRequest;
use App\Http\Requests\ContactModalRequest;
use App\Http\Requests\PhoneContactRequest;
use App\Http\Requests\ProgramContactRequest;


class MainController extends Controller
{


  public function notFound(){

    return response()->view('errors.404')->setStatusCode(404);
  }
  
  public function showWelcome(Request $request) {
    $texts = $request->all()['texts'];
    return view('pages.welcome')
      ->with('texts',$texts);
  }

  public function earlyRegistration(Request $request){
    $texts = $request->all()['texts'];
    $country = Country::all();
    $restricted_countries = $country ->where('is_restricted',1);
    $allowed_countries = $country ->where('is_restricted',0);
    return view('pages.about.early-registration')
      ->with('texts',$texts)
      ->with('restricted_countries',$restricted_countries)
      ->with('allowed_countries',$allowed_countries);
  }

  public function earlyRegistrationSubmit(Request $request){
     $request->validate([
        'name'=> 'required|max:20',
        'middlename'=> 'max:20',
        'surname'=> 'required|max:20',
        'email'=> 'required|email',
        'education_option'=> 'required',
        'message'=> 'max:2000',
        'agree'=> 'required',
        'g-recaptcha-response'=> 'required|recaptcha',
        'country_id' => 'required'
     ]);
     
     $application = $request->only('name','middlename','surname','email','education_option','message','country_id');

     $registration = EarlyRegistration::create($application);
     $this->notifyAdmins(new EarlyRegistrationEmail($registration));
     return redirect()->back()->with('success_message','Your apprlication has been sent successfully');
  }

  public function sendEmail(AdvisoryRequest $request){
    if($request->name || $request->address || $request->age){
      return;
    }
    $data = $request->validated();
  
    $this->notifyAdmins(new ContactEmail($data));
  
    return redirect()->back()->with('success_message','Email successfully sent');
  }

  public function logout(){
    auth()->logout();
    return redirect()->route('welcome',[],301);
  }

  public function acceptCookies() {
    Cookie::queue('accept_cookies', 1, (86400 * 90));
    return 'Cookies accepted';
  }
  
  public function customCookies(Request $request) {
    $input_states = $request->all()['input_states'];
    foreach($input_states as $key => $state) {
      Cookie::queue($key, $state, (86400 * 90));
    }
    return "Custom cookies accepted";
  }
  
  public function showNewsletter(){
    return view('pages.newsletter');
  }

  public function subscribe(Request $request){
    $email = $request->email;
    if(Subscriber::where('email',$email)->count() > 0){
      Subscriber::where('email',$email)->update([
        'is_active' => 1
      ]);
      $success_message = session()->get('applocale') == 'en'  
      ? 'Successfully resubscribed to newsletter'
      : '';
      return redirect()->back()->with('success_message',$success_message);
    }
    $lang = session()->get('applocale') == 'en' ? 1 : 0;
    $request->validate([
      "firstname" => "required",
      "lastname" => "required",
      "email" => "required|email|unique:subscribers,email",
       'g-recaptcha-response' => 'required|recaptcha',
    ]);
    
    $subscriber = $request->only(['email']);
    $subscriber['name'] = $request->firstname. ' '.$request->lastname;
    $subscriber['is_active'] = 1;
    $subscriber['lang'] = $lang;
    $subscriber['code'] = Str::random(30);
    Subscriber::insert($subscriber);
    $success_message = session()->get('applocale') == 'en'  
      ? 'Successfully registered to newsletter'
      : '';
    return redirect()->back()->with('success_message',$success_message);
  }


   public function showBlog(Request $request){
    $news = DynamicNews::orderBy('id','desc')->paginate(6);

    if($news->isEmpty() && $request->has('page')){ 
      abort(404);
    }
    
    $news->appends($_GET)->links();
    return view('pages.news-explorer.all',compact('news'));
  }

  public function showSingleBlog(Request $request,$slug){
    $article = DynamicNews::with('sections')->where('slug',$slug)->first() ?? abort(404);
     
    $last_three_articles = DynamicNews::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
    $next =  DynamicNews::where('id','>',$article->id)->with('sections')->first() ?? DynamicNews::first();
    $prev =  DynamicNews::where('id','<',$article->id)->with('sections')->first() ?? DynamicNews::orderBy('id','desc')->first();


    return view('pages.news-explorer.single',compact('article','last_three_articles','next','prev'));
  
  }
  public function showFactsHub(Request $request){
    $texts = $request->all()['texts'];
    $news = FactHub::orderBy('id','desc')->paginate(6);
    if($request->has('author')){
      $author_id = DynamicNewsAuthorTranslation::where('locale',request()->segment(1))->where('slug',$request->get('author'))->first()->author_id ?? abort(404);
      $news = FactHub::orderBy('id','desc')->where('author_id',$author_id)->paginate(6);
    }
     
    if($news->isEmpty() && $request->has('page')){ 
      abort(404);
    }
    
    $news->appends($_GET)->links();
    return view('pages.facts-hub.all')
          ->with('news',$news)
          ->with('texts',$texts);
  }
  public function showSingleFactsHub($slug){
    $article = FactHub::with('sections')->where('slug',$slug)->first() ?? abort(404);
     
    $last_three_articles = FactHub::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
    $next =  FactHub::where('id','>',$article->id)->with('sections')->first() ?? FactHub::first();
    $prev =  FactHub::where('id','<',$article->id)->with('sections')->first() ?? FactHub::orderBy('id','desc')->first();
    return view('pages.facts-hub.single')
          ->with('last_three_articles',$last_three_articles)
          ->with('next',$next)
          ->with('prev',$prev)
          ->with('article',$article);
  
  }

  public function showPressRelease (){
    $news = PressRelease::orderBy('id','desc')->paginate(5);

    return view('pages.press-release.all')
        ->with('news',$news);
  }
  public function showSinglePressRelease($slug){
     
    $article = PressRelease::with('sections')->where('slug',$slug)->first() ?? abort(404);

      
    $last_three_articles = PressRelease::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
    $next =  PressRelease::where('id','>',$article->id)->with('sections')->first() ?? PressRelease::first();
    $prev =  PressRelease::where('id','<',$article->id)->with('sections')->first() ?? PressRelease::orderBy('id','desc')->first();
    return view('pages.press-release.single',compact('article','prev','next','last_three_articles'));
  }
 
  public function contact(Request $request){
    $texts = $request->all()['texts'];
    $categories = ContactPage::get();
    
    return view('pages.footer.contact-us-page')->with('categories', $categories)->with('texts', $texts);
  }

  public function feature($feature_slug){
     $feature = Feature::where('slug',$feature_slug)->first();
     return view('pages.feature')
      ->with('feature',$feature);
  }

  public function verifyAccount(Request $request, $confcode) {
    $user = User::where('confirmation_code', '=', $confcode)->firstOrFail();

    $success_auth_message_content = 'Your account has been successfully confirmed.<br> You can now log in.';
    $denied_auth_message_content = 'Your account has already been confirmed.<br> You can log in.';
    $expired_auth_message_content = '<div style="text-align:center;">'
        . '<div>This verification link has expired.</div>'
        . '<div style="margin-top:16px;">'
        . '<a href="' . route('verify.mail.resend', $user->confirmation_code) . '" '
        . 'style="display:inline-block;padding:10px 18px;background:#045397;color:#ffffff;text-decoration:none;border-radius:8px;font-weight:600;">'
        . 'Request New Verification Link'
        . '</a>'
        . '</div>'
        . '</div>';

    if ((int) $user->is_verified === 0 && !$request->hasValidSignature()) {
        Session::flash('error', $expired_auth_message_content);
    } elseif ((int) $user->is_verified === 0) {
        $user->update(['is_verified' => 1]);
        Session::flash('success_message', $success_auth_message_content);
    } else {
        Session::flash('success_message', $denied_auth_message_content);
    }

    return redirect()->route('login');
  }

  public function resendVerificationLink($confcode) {
    $user = User::where('confirmation_code', '=', $confcode)->firstOrFail();

    if ((int) $user->is_verified === 1) {
      return redirect()->route('login')->with('success_message', 'Your account is already verified. You can log in.');
    }

    try {
      Mail::to($user->email)->send(new VerificationProfile($user));
    } catch (\Exception $e) {
      info($e->getMessage());
      return redirect()->route('login')->with('error', 'We could not send a new verification email right now. Please try again later.');
    }

    return redirect()->route('login')->with('success_message', 'A new verification email has been sent to your inbox.');
  }

  public function updatePassword(Request $request){
    $request->validate([
      'current_password' => ['required'],
      'password' => [
        'required',
        'string',
        'min:10',
        'confirmed',
        'regex:/[a-z]/',      
        'regex:/[A-Z]/',      
        'regex:/[0-9]/',      
        'regex:/[@$!%*#?&]/'
      ],
    ]);

    $user = Auth::user();

    // Check current password
    if (!Hash::check($request->current_password, $user->password)) {
      return back()->withErrors([
        'current_password' => 'Current password is incorrect.',
    ]);
  }

  // Update password
  $user->password = Hash::make($request->password);
  $user->save();

  return back()->with('success_message', 'Password changed successfully.');
}

public function sendHelpDeskQustion(Request $request){
  $user = auth()->user();
  $is_admin = $user->role_id == 1 ? 1 : 0; 
  $slug = $request->slug ? $request->slug : $this->setHelpDeskNumber($user->role_id);
  $prev_message = HelpDesk::where('slug',$slug)->first();
  if($user->role_id == 2){
    $is_parent = 1;
  }
  elseif($user->role_id == 4){
    $is_parent = 0;
  }
  else{
     $is_parent = $prev_message->is_parent; //in case admin answer  
  }
  
  $help_desk = HelpDesk::create([
    'user_id' => $user->id,
    'is_new' => 1,
    'title' => $request->title,
    'message' => $request->message,
    'is_admin' => $is_admin,
    'is_parent' => $is_parent,
    'slug' => $slug
  ]);

  $receiver = HelpDesk::where('user_id','!=',$user->id)->where('slug',$slug)->first(); //other side of comunication
  if(!$receiver){
    $user = User::where('role_id',1)->first();
    $this->notifyAdmins(new NewHelpDeskAdmin($help_desk));
    
  }
  else{
     $user = $receiver->user;
     try{
          Mail::to($user->email)->send(new NewHelpDesk($user,$help_desk));
      }catch(\Exception $e){
        info($e->getMessage());
      }
  }
 
  Notification::add($user->id,'New message in Help Desk section');
  return redirect()->route('single-help-desk',$slug)->with('success_message','Your question submitted successfully');
}

public function singleHelpDesk($slug){
  $help_desk_messages = HelpDesk::where('slug',$slug)->get();
  if(count($help_desk_messages) == 0){
     abort(404);
  }
  $template = 'admin_template';
  if(auth()->user()->role_id == 2){
    $template = 'parent.dashboard';
  }
  elseif(auth()->user()->role_id == 4){
    $template = 'student.dashboard';
  }
  return view('help-desk.single')
    ->with('help_desk_messages',$help_desk_messages)
    ->with('template',$template);
}

public function helpDesk(){
  $help_desk = HelpDesk::where('user_id',auth()->id())->get()->groupBy('slug');
  $template = 'admin_template';
  if(auth()->user()->role_id == 2){
    $template = 'parent.dashboard';
  }
  elseif(auth()->user()->role_id == 4){
    $template = 'student.dashboard';
  }
  return view('help-desk.inbox')
        ->with('template',$template)
        ->with('help_desk',$help_desk);
}

public function newHelpDesk($slug = null){
  $template = 'admin_template';
  if(auth()->user()->role_id == 2){
    $template = 'parent.dashboard';
  }
  elseif(auth()->user()->role_id == 4){
    $template = 'student.dashboard';
  }
  return view('help-desk.new')
    ->with('slug',$slug)
    ->with('template',$template);
  }
}
