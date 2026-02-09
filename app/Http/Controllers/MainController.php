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


  public $mathias_email;

  function __construct(){
    $this->mathias_email = 'mathias.kunze@onsites.com';
  }
	public function notFound(){

		return response()->view('errors.404')->setStatusCode(404);
	}
  
  public function showWelcome(Request $request) {
    return view('pages.welcome');
  }


  public function showStudiesPages(Request $request,$slug){
    $translation = StudyTranslation::where('locale',app()->currentLocale())->where('slug',$slug)->first() ?? abort(404);
    $study = Study::find($translation->study_id);
    $hreflang_en = StudyTranslation::where('study_id',$study->id)->where('locale','en')->first()->slug;
    $hreflang_de = StudyTranslation::where('study_id',$study->id)->where('locale','de')->first()->slug;
    return view('pages.programs.studies',compact('study','hreflang_de','hreflang_en'));
  }

  public function sendEmail(AdvisoryRequest $request){
    if($request->name || $request->address || $request->age){
      return;
    }
    $data = $request->validated();
  
    try {
      Mail::to($this->mathias_email)->send(new ContactEmail($data));
    }catch(\Exception $e) {
      Log::info($e);
    }
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
          ->with('news',$news);
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
     $news = PressReleaseTranslation::where('slug',$slug)->first() ?? abort(404);
     
    $article = PressRelease::with('sections')->find($news->news_id);

    $hreflang_en = PressReleaseTranslation::where('locale','en')->where('news_id',$article->id)->first()->slug;
    $hreflang_de = PressReleaseTranslation::where('locale','de')->where('news_id',$article->id)->first()->slug;
	  
    $last_three_articles = PressRelease::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
   	$next =  PressRelease::where('id','>',$article->id)->with('sections')->first() ?? PressRelease::first();
    $prev =  PressRelease::where('id','<',$article->id)->with('sections')->first() ?? PressRelease::orderBy('id','desc')->first();
    return view('pages.press-release.single',compact('news','article','prev','next','hreflang_en','hreflang_de','last_three_articles'));
  }
 
  public function contact(){
    $categories = ContactPage::get();
    
    return view('pages.footer.contact-us-page')->with('categories', $categories);
  }

  public function feature($feature_slug){
     $feature = Feature::where('slug',$feature_slug)->first();
     return view('pages.feature')
      ->with('feature',$feature);
  }

  public function verifyAccount($confcode) {
    $user = User::where('confirmation_code', '=', $confcode)->first();
    $confirmed = User::where('is_verified', '=', 0)->where('confirmation_code', '=', $confcode)->count();

    $success_auth_message_content = 'Your account has been successfully confirmed. Welcome!';
    $denied_auth_message_content = 'Your account has already been confirmed.';
    if ($confirmed > 0) {
        User::where('is_verified', '=', 0)->where('confirmation_code', '=', $confcode)->update(['is_verified' => 1]);
        Session::flash('success_message', $success_auth_message_content);
    } else {
        Session::flash('success_message', $denied_auth_message_content);
    }

    Auth::login($user);

    return redirect('/');
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
  
}
