<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;
use Validator;
use App;
use Session;
use Log;
use Cookie;
use Config;
use DB;
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

use App\Country;
use App\Subscriber;
use App\PhoneRequest;
use App\GeneralRequest;
use App\UnsubscribeReason;
use App\IsoIcon;
use App\Job;

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
  private function wordsLimit($text, $limit = 50, $end = '...'){
    $text = strip_tags($text);
    $words = explode(' ', $text);
    if($limit < 1 || sizeof($words) <= $limit) {
      return $text;
    }
    $words = array_slice($words, 0, $limit);
    $output = implode(' ' , $words);
    return $output.$end;
  }
	public function notFound(){

		return response()->view('errors.404')->setStatusCode(404);
	}
  
  public function showWelcome(Request $request) {
    return view('pages.welcome');
  }

  public function showAbout(Request $request){
    return view('pages.collegium-excellentia.about');
  }

  public function showConferenceAndWorkshop(Request $request){
    return view('pages.research.conferences-and-workshops');
  }
  public function showCoaching(Request $request){
    return view('pages.research.coaching');
  }
  public function showPublishing(Request $request){
    return view('pages.research.publishing');
  }
  public function showPublishingServices(Request $request){
    return view('pages.research.publishing-services');
  }

  public function showCodeOfEtics(Request $request){
    return view('pages.collegium-excellentia.code-of-ethics');
  }

  public function showExaminationRules(Request $request){
    return view('pages.resources.examination-rules');
  }

  public function showStudiesPages(Request $request,$slug){
    $translation = StudyTranslation::where('locale',app()->currentLocale())->where('slug',$slug)->first() ?? abort(404);
    $study = Study::find($translation->study_id);
    $hreflang_en = StudyTranslation::where('study_id',$study->id)->where('locale','en')->first()->slug;
    $hreflang_de = StudyTranslation::where('study_id',$study->id)->where('locale','de')->first()->slug;
    return view('pages.programs.studies',compact('study','hreflang_de','hreflang_en'));
  }

  public function showAccreditation(Request $request){
	  $partners = Partner::all();
    return view('pages.collegium-excellentia.accreditation',compact('partners'));
  }
  
  public function showFaq(Request $request){
    $faqcategories  = FaqCategory::all();
    return view('pages.resources.faq',compact('faqcategories'));
  }

  public function getSingleFaqCategory(Request $request,$slug){
    $faq_translation = FaqCategoryTranslation::where('slug',$slug)->first() ?? abort(404);
    $faq_category_questions = FaqCategory::find($faq_translation->category_id);
    $hreflang_en = FaqCategoryTranslation::where('category_id',$faq_translation->category_id)->where('locale','en')->first()->slug;
    $hreflang_de = FaqCategoryTranslation::where('category_id',$faq_translation->category_id)->where('locale','de')->first()->slug;
    return view('pages.resources.single_faq',compact('faq_category_questions','hreflang_en','hreflang_de'));
  }

  public function showImprint(Request $request){
    return view('pages.resources.imprint');
  }

  public function showPrivacyPolicy(Request $request){
    return view('pages.resources.privacy_policy');
  }

  public function showTerms(Request $request){
    return view('pages.resources.terms_and_conditions');
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
    Session::flush();
    return redirect()->route('welcome-'.app()->currentLocale(),[],301);
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
  
  public function showAcademics(Request $request){
    $locale = app()->currentLocale();
    $academics = Academic::where('is_active',1)->get();

    return view('pages.collegium-excellentia.academics',compact('academics'));
  }

  public function showConferenceCalendar(Request $request){
      $conferences = Conference::orderBy('id','desc')->paginate(6);
      if($conferences->isEmpty() && $request->has('page')){ 
        abort(404);
      }
    return view('pages.research.conference_calendar',compact('conferences'));
  }

  public function showRecentPublications(Request $request){
      $publications = Publication::orderBy('id','desc')->paginate(6);
      if($publications->isEmpty() && $request->has('page')){ 
        abort(404);
      }
    return view('pages.research.recent_publications',compact('publications'));
  }

  public function postApplyNow(ApplyConferenceRequest $request){
    $input = $request->validated();
    $conference_details = Conference::with('translated')->find($input['conference_id']);
    $conference_details['heading'] =$conference_details->translated->heading;
    $places =  Conference::where('id',$input['conference_id'])->value('places')-1;
    $places_taken = Conference::where('id',$input['conference_id'])->value('places_taken')+1;
    Conference::where('id',$input['conference_id'])->update(['places_taken'=>$places_taken,'places'=>$places]);
    $name = $request->firstname.' '.$request->lastname;
	  
	  $conference_details['date_from'] = Carbon::parse($conference_details['date_from'])->format('d.m.Y');
	  $conference_details['date_to'] = Carbon::parse($conference_details['date_to'])->format('d.m.Y');
	  
    try {
      Mail::to($input['email'])->send(new ApplyConferenceEmail($name,$input,$conference_details));
    }catch (\Exception $e) {
      Log::info($e);
    }

    try {
      Mail::to($this->mathias_email)->send(new ApplyConferenceEmail($name,$input,$conference_details));
    }catch (\Exception $e) {
      Log::info($e);
    }
   
    return redirect()->back()->with('success_message','You successfully apply for this event');
  }
	
  public function showSingleConference(Request $request,$slug){
    $conference_id = ConferenceTranslation::where('slug',$slug)->first()->conference_id;
    $conference = Conference::find($conference_id);
    $hreflang_en = ConferenceTranslation::where('conference_id',$conference_id)->where('locale','en')->first()->slug;
    $hreflang_de = ConferenceTranslation::where('conference_id',$conference_id)->where('locale','de')->first()->slug;
    return view('pages.research.single_conference',compact('conference','hreflang_en','hreflang_de'));
  }

  public function showStudyPrograms(Request $request, $slug, $program_slug) {

    $locale = request()->segment(1);
    $current_translation = ProgramTranslation::where('slug', $program_slug )->where('locale', $locale)->first() ?? abort(404);
    $current_study = StudyTranslation::where('slug', $slug )->where('locale', $locale)->first() ?? abort(404); //only check
    
    $program = Program::where('id', $current_translation->program_id)->first() ?? abort(404);

    $study_en = StudyTranslation::where('locale','en')->where('study_id',$program->study->id)->first()->slug;
    $study_de = StudyTranslation::where('locale','de')->where('study_id',$program->study->id)->first()->slug;
    $hreflang_en =$study_en. '/'. ProgramTranslation::where('locale','en')->where('program_id',$program->id)->first()->slug;
    $hreflang_de =$study_de. '/'. ProgramTranslation::where('locale','de')->where('program_id',$program->id)->first()->slug;

    $countries = Country::orderBy('nicename')->get();
    if(request()->segment(1) == 'de'){
       $countries = Country::orderBy('nicename_de')->get();
    }
    $study_periods = $program->study->studies_periods;

    if($program->study->id==3){
      $study_periods = StudyPeriod::where('study_id',2)->get();  // because the retards combined Master and MBA programs
    }
    
    $price_program = PaymentPeriod::where('study_period_id',$study_periods[0]->id)->orderby('id','desc')->first();

    $durations = [];
    foreach($study_periods as $study_period){
      $durations[] = $study_period->period->semesters;
    }

    $duration_string = count($durations) == 1 
      ?  $durations[0] 
      : $durations[0].'-'.end($durations);
    $next_program = Program::where('id','>',$program->id)->where('study_id',$program->study_id)->first() 
                  ??  Program::where('study_id',$program->study_id)->first();

    $prev_program = Program::where('id','<',$program->id)->where('study_id',$program->study_id)->orderBy('id','desc')->first() 
                  ??   Program::where('study_id',$program->study_id)->orderBy('id','desc')->first();
    $partners = Partner::all();
    $iso_icons = IsoIcon::all();

    return view('pages.programs.single_program', compact('iso_icons','partners','hreflang_en','hreflang_de','program', 'next_program', 'prev_program','duration_string','price_program','countries'));
  }

  public function receiveApplication(Request $request) {
   
    $passport = '';
    $cv = '';
    $degrees = '';
    $reference_letter = '';

    $input = $request->all();

    if ($request->hasFile('passport')) {
      $file = $request->file('passport');
      $file_name = $file->getClientOriginalName();
      $destinationPath = public_path('/files/passport');
      $file->move($destinationPath, $file_name);
      $passport = $file_name;
     
    }
    if ($request->hasFile('cv')) {
      $file = $request->file('cv');
      $file_name = $file->getClientOriginalName();
      $destinationPath = public_path('/files/cv');
      $file->move($destinationPath, $file_name);
      $cv = $file_name;
    }
    if($request->hasFile('degrees')) {
      $file = $request->file('degrees');
      $file_name = $file->getClientOriginalName();
      $destinationPath = public_path('/files/degrees');
      $file->move($destinationPath, $file_name);
      $degrees = $file_name;
    }
    if($request->hasFile('reference_letter')) {
      $file = $request->file('reference_letter');
      $file_name = $file->getClientOriginalName();
      $destinationPath = public_path('/files/reference_letter');
      $file->move($destinationPath, $file_name);
      $reference_letter = $file_name;
    }

    Application::insert([

      'program_id' => $input['chosen_program'],
      'learning_period' => $input['learning_period'],
      'starting_date' => $input['program_day'].'.'.$input['program_month'].'.'.$input['program_year'],
      'name' => $input['first_name'].' '.$input['middle_name'].' '.$input['family_name'],
      'birthday' => $input['day'].' '.$input['month'].' '.$input['year'],
      'gender' => $input['chosen_gender'],
      'mail' => $input['mail'],
      'phone_number' => $input['phone_code'].' '.$input['phone_number'],
      'country' => $input['country'],
      'city' => $input['city'],
      'zip' => $input['zip_code'],
      'address' => $input['address'],
      'how_you_learn_about_us' => $input['how_you_learn_about_us'],
      'why_did_you_chose_us' => $input['why_did_you_chose_us'],
      'payment_option' => $input['payment_option'],
      'passport' => $passport,
      'cv' => $cv,
      'degrees' => $degrees,
      'reference_letter' => $reference_letter,
	    'place_of_birth' => $input['place_of_birth']
    ]);
    $program_name = ProgramTranslation::where('id',$input['chosen_program'])->first()->name;
    
    $application = Application::orderBy('id','desc')->first();
    try {
      Mail::to($this->mathias_email)->send(new ReceiveApplication($application,$program_name));
      Mail::to($application->mail)->send(new ConfirmationForApplication());
    }
    catch(Exception $e) {
      info($e);
    }
    $lang = app()->currentLocale() == 'de' ? 0 : 1;
    Subscriber::insert([
      'name' =>  $input['first_name'] . ' ' . $input['family_name'],
      'is_active' => 1, 
      'email' => $input['mail'],
      'lang' => $lang,
	   'code' => Str::random(30)
    ]);
    $message = app()->currentLocale() == 'de'  ? 'Vielen Dank für Deine Bewerbung' : 'Thanks for your application';
    return redirect()->route('welcome-'.app()->currentLocale())->with('success_message',$message);
  }

  public function getSelectedProgram(Request $request) {
    $id = $request->all();
    $selected_program = Program::where('id', $id)->first();

    return $selected_program;
  }

  public function useRedeemCode(Request $request) {
    $redeemed_program = Program::where('id', $request->id)
                                ->where('redeem_code', $request->code)
                                ->first();

    if($redeemed_program == '') {
      $redeemed_program = 'Wrong code!';
    }

    return $redeemed_program;
  }
  
  //Digital Studieng
  public function showDigitalStudies(Request $request){
    return view('pages.digital-studying.digital-studies');
  }
  public function showRecognition(Request $request){
    return view('pages.digital-studying.recognition-of-previous-achievements');
  }

  public function showStudyFinancing(Request $request){
      return view('pages.digital-studying.study-financing');
  }

  public function showStudyiengAdvisoryService(Request $request){
      return view('pages.digital-studying.student-advisory-service');
  }

  public function showStudyRegistration(Request $request){
      $programs = Program::all();
      $studies = Study::all();
      $countries = DB::table('countries')->get();
      $now = Carbon::now();
      $next_month = $now->addMonth();
      $month = $next_month->format('F');
      $year = $now->format('Y');
      return view('pages.digital-studying.study-registration')
          ->with('countries', $countries)
          ->with('studies',$studies)
          ->with('month',$month)
          ->with('year',$year)
          ->with('programs',$programs);  
  }

  public function getPrograms(Request $request) {
      $study_id = $request->study_id;
      app()->setLocale(Session::get('applocale'));
      if($study_id == 2){
        $study  = Study::whereIn('id',[2,3])
                        ->with('studies_periods.period.translated')
                        ->with('programs.translated')
                        ->get();
      }
      else{
        $study = Study::with('studies_periods.period.translated')
                      ->with('programs.translated')
                      ->find( $study_id);
      }

      return $study;
  }

  public function getPaymentOption(Request $request){
	  app()->setLocale(Session::get('applocale'));
    $study_period = $request->study_period;
    $payment_periods = PaymentPeriod::where('study_period_id',$study_period)
                                    ->with('payment.translated')
                                    ->get();
    return $payment_periods;
  }
 
  public function showPromotion(){
      return view('pages.promotion');
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

  public function unsubscribePage($code){
    $subscriber =  Subscriber::where('code', $code)->first();
    return view('pages.resources.unsubscribe')
      ->with('subscriber',$subscriber);
  }

  public function unsubscribeUser(Request $request,$subscriber_id){
      $reasons = $request->reasons;
      $feedback = $request->feedback;
      Subscriber::where('id',$subscriber_id)->update(['is_active' => 0]);
      UnsubscribeReason::where('subscriber_id',$subscriber_id)->delete();
      foreach($reasons as $reason){
        UnsubscribeReason::insert([
          'subscriber_id' => $subscriber_id,
          'reason' => $reason,
          'feedback' => $feedback
        ]);
      }
      return redirect()->back();
  }
  
  public function allPrograms(){
     $studies = Study::with('programs')->get();
     return view('pages.programs.all-programs')
            ->with('studies', $studies);
  }

  //TODO::create route because no content yet
  public function singleJob($slug){
      if(request()->segment(1) == 'de'){
        $job = Job::where('slug_de',$slug);
      }
      else{
        $job = Job::where('slug',$slug);
      }
      return view('pages.reseach.job')
        ->with('job',$job);
  }
   public function showBlog(Request $request){
    $news = DynamicNews::orderBy('id','desc')->paginate(6);

    if($request->has('author')){
      $author_id = DynamicNewsAuthorTranslation::where('locale',request()->segment(1))->where('slug',$request->get('author'))->first()->author_id ?? abort(404);
      $news = DynamicNews::orderBy('id','desc')->where('author_id',$author_id)->paginate(6);
    }
     
    if($news->isEmpty() && $request->has('page')){ 
      abort(404);
    }
    
    $news->appends($_GET)->links();
    return view('pages.news-explorer.all',compact('news'));
  }

  public function showSingleBlog(Request $request,$slug){
    $news = DynamicNewsTranslation::where('slug',$slug)->first() ?? abort(404);
     
    $article = DynamicNews::with('sections')->find($news->news_id);

    $hreflang_en = DynamicNewsTranslation::where('locale','en')->where('news_id',$article->id)->first()->slug;
    $hreflang_de = DynamicNewsTranslation::where('locale','de')->where('news_id',$article->id)->first()->slug;
	  
    $last_three_articles = DynamicNews::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
   	$next =  DynamicNews::where('id','>',$article->id)->with('sections')->first() ?? DynamicNews::first();
    $prev =  DynamicNews::where('id','<',$article->id)->with('sections')->first() ?? DynamicNews::orderBy('id','desc')->first();
 
    return view('pages.news-explorer.single',compact('article','hreflang_en','hreflang_de','last_three_articles','next','prev'));
	
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
     $news = FactHubTranslation::where('slug',$slug)->first() ?? abort(404);
     
    $article = FactHub::with('sections')->find($news->news_id);

    $hreflang_en = FactHubTranslation::where('locale','en')->where('news_id',$article->id)->first()->slug;
    $hreflang_de = FactHubTranslation::where('locale','de')->where('news_id',$article->id)->first()->slug;
	  
    $last_three_articles = FactHub::where('id','!=',$article->id)
                        ->orderBy('id','desc')
                        ->get()
                        ->take(3);
 
   	$next =  FactHub::where('id','>',$article->id)->with('sections')->first() ?? FactHub::first();
    $prev =  FactHub::where('id','<',$article->id)->with('sections')->first() ?? FactHub::orderBy('id','desc')->first();
    return view('pages.facts-hub.single',compact('news','article','prev','next','hreflang_en','hreflang_de','last_three_articles'));
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
  public function certification($slug){
      $certificate = IsoIcon::where('slug',$slug)->first() ?? abort(404);
      return view('pages.resources.certificate-info')
          ->with('certificate',$certificate);
  }

  public function accessibility(){
      return view('pages.resources.accessibility');
  }
  // public function showArtificialInteligence(){
  //   return view('pages.research.ai');
  // }
  // public function showcyberSecurity(){
  //   return view('pages.research.cyber-security');
  // }
  // public function showGreenEnergetics (){
  //   return view('pages.research.green-energetics');
  // }
}
