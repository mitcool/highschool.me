<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Validator;
use Log;
use Config;
use DB;
use Mail;

use App\Application;
use App\Academic;
use App\AcademicTranslation;
use App\Company;
use App\Partner;
use App\PartnerTranslation;
use App\Publication;
use App\PublicationTranslation;
use App\Conference;
use App\ConferenceTranslation;
use App\Faq;
use App\FaqTranslation;
use App\FaqCategory;
use App\FaqCategoryTranslation;
use App\Author;
use App\Text;
use App\Slide;
use App\AboutPicture;
use App\Program;
use App\HelpDeskVideo;
use App\ProgramTranslation;
use App\Study;
use App\StudyTranslation;
use App\Tutorial;
use App\TutorialTranslation;
use App\Testimonial;
use App\TestimonialTranslation;
use App\Image;
use App\ImageAttribute;
use App\DynamicNewsAuthor;
use App\DynamicNewsAuthorTranslation;
use App\Newsletter;
use App\NewsletterSubscriber;
use App\Subscriber;
use App\NewsletterSection;
use App\ProgramPartner;
use App\UnsubscribeReason;
use App\Job;
use App\JobCategory;
use App\User;
use App\Meeting;
use App\Course;
use App\CourseType;
use App\FeatureCategory;
use App\Plan;
use App\Feature;
use App\Invoice;
use App\StudentDocument;
use App\ParentStudent;
use App\ApDetail;
use App\CatalogCourse;
use App\ClepDetail;
use App\CourseCategory;
use App\CurriculumCourse;
use App\CurriculumType;
use App\EsolDetail;
use App\SubjectArea;
use App\CourseFile;
use App\CourseVideo;
use App\AmbassadorService;
use App\AmbassadorReward;
use App\AmbassadorServiceAction;
use App\AmbassadorActivity;
use App\HelpDesk;
use App\Exam;
use App\StudentSpotlight;
use App\StudentSpotlightsCategory;
use App\ExamQuestion;
use App\StudentAnswer;
use App\SelfAssessmentQuestion;
use App\SelfAssessmentAnswer;
use App\EducatorCategory;
use App\LeaveRequest;
use App\DiplomaPrintingRequest;
use App\StudentEnrolledCourse;
use App\Notification;

use App\Mail\StudentCredentials;
use App\Mail\LeaveRequestAnswer;

class AdminController extends Controller
{

    private function uploadFile($file,$path){
        $filename = $file->getClientOriginalName();
        $file->move(base_path().$path, $filename);
        return $filename;
    }
   private function createImage($nickname,$path){
        Image::insert([
            'nickname' => $nickname,
            'src' => $path,
            'alt'=> '-',
            'title'=> '-',

        ]);
   }

   private function deleteImage($nickname){
        $image = Image::where('nickname', $nickname)->first();

        try{
            unlink(base_path().'/public/'.$image->src);
            Image::find($image->id)->delete();
        }catch(\Exception $e){
            info($e->getMessage());
        }
        
   }
            
    public function cleanSlug($string) {
        $string = str_replace('&', '', $string);
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        return strtolower(trim($string, '-'));
    }

    public function showAdminWelcome(Request $request) {
        return view('admin.welcome');
    }

    public function showTexts(){
        $pages = Text::distinct('slug')->pluck('slug');
        return view('admin.texts')
                ->with('pages',$pages);
    }

    public function showSingleTexts($slug){
        $texts = Text::where('slug',$slug)->get();
        return view('admin.single-text')
                ->with('texts',$texts);
    }

   
    public function getAdminAcademics(){
        $academics = Academic::all();
        return view('admin.academics')
            ->with('academics',$academics);
    }

    public function addAcademic(Request $request){
        $request->validate([
            'picture' => 'max:200'
        ]);
        $academic_data = $request->only('name','slug','description');
        $academic = Academic::create($academic_data);
        $image = $request->file('picture');
        $input = $request->all();
        $pictureName = $image->getClientOriginalName();
        $destinationPath = public_path('/images/');       
        $image->move($destinationPath, $pictureName);
        $nickname = 'academic-'.$academic->id;
        $path = '/images/'.$pictureName;
        $this->createImage($nickname,$path);

        return redirect()->back()->with('success_message','Academic added successfully');
    }

    public function editAcademic(Request $request){
        $input = $request->except('_token');
        Academic::where('id',$input['id'])->update($input);
        return redirect()->back()->with('success_message','Academic edited successfully');
    }

    public function deleteAcademic($id){
        $academic = Academic::find($id);
        $this->deleteImage('academic-'.$id);
        Academic::where('id',$id)->delete();
        return redirect()->route('admin-academics')->with('success_message','Academic deleted successfully');
    }

    public function editSingleAcademic($academic_id){
        $academic = Academic::find($academic_id);
        return view('admin.single-academic')
                ->with('academic',$academic);
    }

    public function uploadPartner(Request $request){
        $request->validate([
            'picture' => 'required|image|max:300',
            
        ]);
        $input = $request->all();
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $picture =$image->getClientOriginalName();
            $partner_id =  Partner::insertGetId([
                'created_at'=>Carbon::now(),
            ]);
            foreach(Config('languages') as $lang => $language) {
                PartnerTranslation::insert([
                    'text'=> $input['text_'.$lang],
                    'name'=> $input['name_'.$lang],
                    'partner_id'=>$partner_id,
                    'locale' => $lang,
                ]);
            }
           
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $picture);

            $nickname = 'partner-'.$partner_id;
            $path ='/images/'.$picture;
            $this->createImage($nickname, $path);
            
            return redirect()->back()->with('success_message',"Successfully add a new partner to our website!");
        }
    }

    public function editPartner(Request $request,$partner_id){
        $input = $request->all();
        foreach(Config('languages') as $lang => $language) {
            PartnerTranslation::where('partner_id',$partner_id)->where('locale',$lang)->update([
                'text'=> $input['text_'.$lang],
                'name' => $input['name_'.$lang]
            ]);
        }

        return redirect()->back()->with('success_message',"Successfully edited partner!");
    }
    public function deletePartner($id){
       Partner::find($id)->delete();
       PartnerTranslation::where('partner_id',$id)->delete();
       $this->deleteImage('partner-'.$id);
       return redirect()->back()->with('success_message','Successfuly deleted partner');
    }

    public function showAdminPublication(Request $request){
        $publications = Publication::all();
        return view('admin.publication',['text_pages'=>$request->all()['text_pages'],'publications'=>$publications]);
    }

    public function addFaq(Request $request){
        $input = ($request->except('text_pages'));
        $faq_id = Faq::insertGetId([
            'category_id'=> $input['category_id']
        ]);
        foreach(Config::get('languages') as $lang => $language){
            FaqTranslation::insert([
                'question' => $input['question_'.$lang],
                'answer' => $input['answer_'.$lang],
                'locale' => $lang,
                'faq_id' => $faq_id,
            ]);
        }

        return redirect()->back()->with('success_message',"Successfully added FAQ");
    }

    public function editFaq(Request $request,$id){
       $input = $request->only('category_id','question','answer');
       $faq_id = FaqTranslation::find($id)->faq_id;
       Faq::where('id',$faq_id)->update(['category_id' => $input['category_id']]);
       FaqTranslation::where('id',$id)->update([
            'question'=>$input['question'],
            'answer' => $input['answer'],
       ]);
       return redirect()->back()->with('success_message',"Successfully edited FAQ");
    }
    
    public function deleteFaq(Request $request, $faq_id){
        Faq::find($faq_id)->delete();
        FaqTranslation::where('id', $faq_id)->delete();
        return redirect()->back()->with('success_message',"Successfully deleted FAQ");
    }

    public function changeText(Request $request){
        
        $ids = $request->id;
        $text_en = $request->text_en;
       
        for($i=0;$i<count($ids);$i++){
            
            Text::where('id',$ids[$i])->update([
                'text_en'=> $text_en[$i],
            ]);
        }
       
        return redirect()->back()->with('success_message','The text was successfully updated');
    }

    public function adminPartners(){
        $partners = Partner::all();
        return view('admin.partners')
                ->with('partners',$partners);
    }
    
    public function deleteTutorial($tutorial_id){
        Tutorial::find($tutorial_id)->delete();
        TutorialTranslation::where('tutorial_id',$tutorial_id)->delete();
        foreach(Config::get('languages') as $lang => $language){
            $this->deleteImage('tutorial-'.$lang.'-'.$tutorial_id);
        }        
        return redirect()->route('admin-tutorials')->with('success_message','Tutorial deleted successfully!');

    }

   
    public function faq(){
        $faq_categories = FaqCategory::all();
        return view('admin.faq')
                ->with('faq_categories',$faq_categories);
    }

    public function getFaqCategories(){
        $faq_categories = FaqCategory::all();
        return view('admin.faq-categories')
                ->with('faq_categories',$faq_categories);
    } 

    public function editFaqCategories(Request $request,$category_id){
        $input = $request->all();
        foreach(Config::get('languages') as $lang => $language){
            FaqCategory::where('category_id',$category_id)->where('locale',$lang)->update([

                  'name' => $input['name_'.$lang],
                  'slug' => $input['slug_'.$lang],
                  'meta_title' => $input['meta_title_'.$lang],
                  'meta_description' => $input['meta_description_'.$lang]  
            ]);
        }

        return redirect()->back()->with('success_message','Data successfuly updated');
    }

    public function getFaqByCategory(Request $request, $category_id) {
        $faqs = Faq::where('category_id', $category_id)->get();
        $faq_categories = FaqCategory::all();

        return view('admin.edit_single_faq_by_category')->with('faqs', $faqs)->with('faq_categories',$faq_categories);
    }

    public function testimonials(){
        $testimonials = Testimonial::all();
        return view('admin.testimonials')->with('testimonials',$testimonials);
    }

    public function addTestimonial(Request $request){
        
        $input = $request->all();
        $testimonial_id = Testimonial::insertGetId(['created_at' => Carbon::now()]);

        foreach(Config('languages') as $lang => $language){
            TestimonialTranslation::insert([

                'name' =>$input['name_'.$lang],
                'text' =>$input['text_'.$lang],
                'locale' => $lang,
                'testimonial_id' => $testimonial_id
            ]);
        }
        return redirect()->back()->with('success_message','Successfully added testimonial!');
    }

    public function editTestimonial($testimonial_id){
        $testimonial = Testimonial::find($testimonial_id);
        return view('admin.edit-testimonial')
                ->with('testimonial',$testimonial);
    }

    public function editTestimonialPost(Request $request,$testimonial_id){
        $input = $request->all();
        foreach(Config('languages') as $lang => $language){
            TestimonialTranslation::where('testimonial_id',$testimonial_id)->where('locale',$lang)->update([
                'name' =>$input['name_'.$lang],
                'text' =>$input['text_'.$lang],
            ]);
        }

        return redirect()->back()->with('success_message','Testimonial edited successfully!');
    }

    public function deleteTestimonial($testimonial_id){
        Testimonial::find($testimonial_id)->delete();
        TestimonialTranslation::where('testimonial_id', $testimonial_id)->delete();
        return redirect()->back()->with('success_message','Successfully deleted testimonial!');
    }

    public function images(){
        $images = Image::all();
        return view('admin.images')->with('images', $images);
    }

    public function addImage(Request $request){
        $validator = Validator::make($request->all(),[
            'nickname' => 'required|unique:images',
            'picture' => 'max:300'
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->first());
        }
        $input = $request->all();
        $file_name = $input['name'].'.'.$request->file('picture')->getClientOriginalExtension();
        $request->file('picture')->move(public_path('images'),$file_name);
        $image_id = Image::insertGetId([
            'nickname' => $input['nickname'],   
            'src' => '/images/' . $file_name
        ]);
        foreach(Config('languages') as $lang => $language){
            ImageAttribute::insert([
                'image_id' => $image_id,
                'alt' => $input['alt_'.$lang],
                'title' => $input['title_'.$lang],
                'locale' => $lang
            ]);
        }

        return redirect()->back()->with('success_message', 'Image Added Successfully');
    }

    public function editImage(Request $request,$image_id){
        $request->validate([
            'picture' => 'max:300'
        ]);
      $input = $request->all();

      if($input['name'] && $request->file('picture')){

        $old_image_path = Image::find($image_id)->src;
            
        try{
            unlink(public_path($old_image_path ));
        }catch(\Exception $e){
        
            info($e->getMessage());
        }

        $file_name = $input['name'].'.'.$request->file('picture')->getClientOriginalExtension();
        $request->file('picture')->move(public_path('images'),$file_name);

        Image::where('id',$image_id)->update([
            'src' => '/images/' . $file_name
        ]);
      }
      foreach(Config('languages') as $lang => $language){
        ImageAttribute::where('image_id',$image_id)->where('locale',$lang)->update([
            'alt' => $input['alt_'.$lang],
            'title' => $input['title_'.$lang],
        ]);
      }
      return redirect()->back()->with('success_message', 'Image Editted Successfully');
    }
    
    public function applications(){
        $applications = Application::orderBy('id','desc')->get();
        return view('admin.applications')
            ->with('applications', $applications);
    }
    public function application($application_id){
        $application = Application::find($application_id);
        return view('admin.application')
            ->with('application', $application);
    }

    public function showAuthors(Request $request){
        $authors = DynamicNewsAuthor::all();
        return view('admin.edit_authors')
            ->with('authors',$authors);
    }
    
    public function editAuthorNews(Request $request,$author_id){
        $author = $request->only('name','description','slug');
        DynamicNewsAuthor::find($author_id)->update($author);
        return redirect()->back()->with('success_message','Author edited successfully!');
    }

    public function addAuthorNews(Request $request){
        $request->validate([
            'picture' => 'max:300'
        ]);
        $path  = base_path()."/public/images";
        $author = $request->only('name','description','slug');
        $author['avatar'] = $this->upload_file($request->file('picture'),$path);
        DynamicNewsAuthor::create($author);
        return redirect()->back()->with('success_message','Author added successfully!');
    }

    public function deleteAuthor($id){
        $author = DynamicNewsAuthor::find($id);      
        DynamicNewsAuthor::where('id',$id)->delete();
        return redirect()->route('edit-authors')->with('success_message','Author deleted successfully');
    }

    public function showSingleAuthor($author_id){
        $author = DynamicNewsAuthor::find($author_id);
        return view('admin.edit_single_author')
            ->with('author',$author);
    }

    public function newsletter(){
        return view('admin.newsletter');
    }

    
    public function saveNewsletter(Request $request){
        $contents = $request->contents;
        $contents_de = $request->contents_de;
        $links = $request->links;
        $images = $request->images;
        $newsletter = $request->only('sender','subject','subject_de','cover_image','greeting_en','greeting_de');

        $request->validate([
            'sender' => 'required',
            'subject' => 'required',
            'subject_de' => 'required',
            'cover_image' => 'required',
            "images.*" => 'dimensions:min_width=468,min_height=80,max_width=468,max_height=80',
        ],[
            'images.*.dimensions' => 'All the advertisement images should be 468 px in width and 80 px in height.'
        ]);
        
        if($request->hasFile('cover_image')){
            $newsletter['cover_image'] = $this->uploadFile($request->file('cover_image'),'/public/images/newsletter');
        }
        try{
            $newsletter = Newsletter::create($newsletter);
            foreach($contents as $key => $content){
                if(!$images){
                    return redirect()->back()->withInput()->with('error','No images selected please check and reupload the images!');
                }
                if(array_key_exists($key,$images)){
                    if(!$content || !$contents_de[$key] || !$links[$key]){
                        return redirect()->back()->withInput()->with('error','Please complete every section and reupload the images!');
                    }
                    $image = $this->uploadFile($images[$key],'/public/images/newsletter');
                    NewsletterSection::create([
                        'content_de' => $contents_de[$key],
                        'content' => $content,
                        'link' => $links[$key],
                        'image' => $image,
                        'newsletter_id' => $newsletter->id
                    ]);
                }
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        

        $subscribers = Subscriber::where('is_active',1)->get();

        foreach($subscribers as $subscriber){
            
            NewsletterSubscriber::insert([
                'subscriber_id' => $subscriber->id,
                'newsletter_id' => $newsletter->id
            ]);
        }
        return redirect()->back()->with('success_message','Newsletter created successfully');
    }

    public function newsletterStats(){
        $unsubscribed_users = Subscriber::where('is_active',0)->paginate(20);
        $subscribers = Subscriber::where('is_active',1)->paginate(20);
        $unsubscribed_users_count = count($unsubscribed_users);
        $subscribers_count = count($subscribers);
        $unsubscibe_reasons = UnsubscribeReason::get()->groupBy('reason');
        
        return view('admin.newsletter-stats')
            ->with('subscribers',$subscribers)
            ->with('unsubscribed_users',$unsubscribed_users)
            ->with('unsubscribed_users_count', $unsubscribed_users_count)
            ->with('unsubscibe_reasons',$unsubscibe_reasons)
            ->with('subscribers_count',$subscribers_count);
    }
    

    public function updateSubscribtion ($id){
        $subscriber = Subscriber::find($id);
        $is_active = $subscriber->is_active == 1 ? 0 : 1;
        $subscriber->is_active = $is_active;
        $subscriber->save();
        if($is_active == 1){
            UnsubscribeReason::where('subscriber_id',$id)->delete();
        }
        return redirect()->back()->with('success_message','Success');
    }

    public function addSubscriber(Request $request){
        $subscriber = $request->only('email','name','lang');
        $subscriber['is_active'] = 1;
        $subscriber['code'] = Str::random(30);
        Subscriber::create($subscriber);
        return redirect()->back()->with('success_message','Success');
    }

    public function findSubscriber(Request $request){
        $search = $request->search;
        $unsubscibe_reasons = UnsubscribeReason::get()->groupBy('reason');
        //All users for display chart correctly
        $unsubscribed_users = Subscriber::where('is_active',0)->paginate(20);
        $subscribers = Subscriber::where('is_active',1)->paginate(20);
        $unsubscribed_users_count = count($unsubscribed_users);
        $subscribers_count = count($subscribers);
      
        //Filterd users
        $unsubscribed_users = Subscriber:: where('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->where('is_active',0)
                ->paginate(20);
        $subscribers = Subscriber:: where('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->where('is_active',1)
                ->paginate(20);
        return view('admin.newsletter-stats')
            ->with('subscribers',$subscribers)
            ->with('unsubscribed_users',$unsubscribed_users)
            ->with('unsubscribed_users_count', $unsubscribed_users_count)
            ->with('unsubscibe_reasons',$unsubscibe_reasons)
            ->with('subscribers_count',$subscribers_count);
    }

     public function plans(){
        $plans = Plan::all();
        $features = Feature::all();
        return view('admin.plans')
        ->with('features',$features)
        ->with('plans',$plans);
     }
     public function features(){
        $features = Feature::all();
        $categories = FeatureCategory::all();
        return view('admin.features')
            ->with('categories', $categories)
            ->with('features',$features);
     }

     public function addFeature(Request $request){
        $feature = $request->except('_token');
        $feature['_order'] = 1; //After that admin order them in separate section
        Feature::create($feature);
        return redirect()->back()->with('success_message','Feature added successfully');
     }

     public function editFeature($feature_id){
        $categories = FeatureCategory::all();
        $feature = Feature::find($feature_id);
        return view('admin.feature-edit')
            ->with('categories',$categories)
            ->with('feature',$feature);
     }
     public function updateFeature(Request $request,$feature_id){
        $feature = $request->except('_token');
        Feature::find($feature_id)->update($feature);
        return redirect()->back()->with('success_message','Feature updated successfully');
     }
     public function deleteFeature($feature_id){
        Feature::find($feature_id)->delete();
        return redirect()->back()->with('success_message','Feature deleted successfully');
     }

     public function featureOrder(){
        $categories = FeatureCategory::all();
        return view('admin.feature-order')->with('categories',$categories);
     }

     public function reOrderFeatures(Request $request){
        $ids = $request->ids;
       
        $order = $request->order;
        foreach($ids as $key => $id){
            Feature::where('id',$id)->update(['_order'=>$order[$key]]);
        }
        return redirect()->back()->with('success_message','Features re-ordered successfully');
     }
     public function editPlans(Request $request){
         $plan_id = $request->plan_id;
         $plan = $request->except('_token','plan_id');
         Plan::find($plan_id)->update($plan);
         return redirect()->back()->with('success_message','Plan Features updated successfully');
     }

     public function meetings(){
        $educators = User::where('role_id',5)->get();
        $parents = User::where('role_id',2)->get();
        return view('admin.meetings')
            ->with('educators',$educators)
            ->with('parents',$parents);
     }
     public function createMeeting(Request $request){
        $meeting = $request->except('_token');
        Meeting::create($meeting);
        return redirect()->back()->with('success_message','Meeting created successfully');
     }

     public function courseTypes(){
        $courses = CourseType::all();
        return view('admin.course-types')
            ->with('courses',$courses);
     }

    public function editCourseType($type_id){
        $course = CourseType::find($type_id);
        $courses = CourseType::all();
        return view('admin.edit-single-course-type')
            ->with('courses',$courses)
            ->with('course',$course);
     }

     public function updateCourseType(Request $request,$course_id){
        $course = $request->only('name','description','price');
        $course['type'] = 0;
        $course = CourseType::find($course_id)->update($course);

        return redirect()->back()->with('success_message','Course type updated successfully');
     }

     public function addCourseType(Request $request){
      
        $course = $request->only('name','description','price');
        $course['type'] = 0;
        $course = CourseType::create($course);
        $file = $request->file('image');
        $pic_name = $file->getClientOriginalName();
        $request->file('image')->move(base_path()."/public/images/courses", $pic_name);
        $nickname = 'course-'.$course->id;
        $path = "/images/courses/".$pic_name;
        $this->createImage($nickname,$path);
        return redirect()->back()->with('success_message','Course type created successfully');
     }

     public function deleteCourseType($course_type_id){
        CourseType::find($course_type_id)->delete();
        return redirect()->route('admin-courses-types')->with('success_message','Course type deleted successfully');
     }

    
    public function showInvoices() {
        $invoices = Invoice::all();

        return view('admin.invoices')->with('invoices', $invoices);
    }

    public function singleInvoice(Request $request, $id) {
        $invoice = Invoice::where('id', $id)->first();

        return view('admin.single-invoice')->with('invoice', $invoice);
    }

    public function allEnrollmentCoursesPage() {
        $courses = CatalogCourse::with('curriculumCourses')->paginate(10);

        return view('admin.all-enrollment-courses')->with('courses', $courses);
    }

    public function showAddEnrollmentCourse() {
        $curriculumTypes = CurriculumType::get();
        $categories = CourseCategory::get();

        return view('admin.enrollment-courses')->with('curriculumTypes', $curriculumTypes)->with('categories', $categories);
    }

    public function AddEnrollmentCourse(Request $request) {
        // Get the curriculum type first so we know which extra fields are required
        $curriculumType = CurriculumType::findOrFail($request->input('curriculum_type_id'));

        // Base validation rules (common for all types)
        $rules = [
            'curriculum_type_id' => ['required', 'exists:curriculum_types,id'],
            'title'              => ['required', 'string', 'max:255'],
            'fldoe_course_code'  => ['nullable', 'string', 'max:20'],
            'course_number'      => ['nullable', 'string', 'max:20'],
            'default_credits'    => ['nullable', 'numeric', 'min:0'],
            'category_id'        => ['nullable', 'exists:course_categories,id'],
            'required_flag'      => ['nullable', 'boolean'],
            'requirement_text'   => ['nullable', 'string', 'max:255'],
            'notes'              => ['nullable', 'string'],

            //files
            'resource_files_labels'    => ['nullable', 'array'],
            'resource_files_labels.*'  => ['nullable', 'string'],

            //video
            'video_titles'             => ['nullable', 'array'],
            'video_titles.*'           => ['nullable', 'string', 'max:255'],
            'video_urls'               => ['nullable', 'array'],
            'video_urls.*'             => ['nullable', 'url', 'max:2048'],
        ];

        // Add type-specific validation rules
        switch ($curriculumType->code) {
            case 'AP':
                $rules = array_merge($rules, [
                    'ap_subject_code' => ['required', 'string', 'max:20'],
                    'ap_exam_code'    => ['required', 'string', 'max:10'],
                ]);
                break;

            case 'ESOL':
                $rules = array_merge($rules, [
                    'lld_level'   => ['required', 'string', 'max:50'],
                    'cefr_level'  => ['required', 'string', 'max:10'],
                ]);
                break;

            case 'CLEP':
                // nothing extra required, but you could add optional fields here later
                break;

            default:
                // CORE / ELECTIVE / CTE / PSAT / SAT / PREACT / ACT etc.
                break;
        }

        $data = $request->validate($rules);

        // Normalize some values
        $requiredFlag    = isset($data['required_flag']) ? (bool)$data['required_flag'] : false;
        $creditsOverride = $data['credits_override'] ?? null;

        DB::transaction(function () use ($curriculumType, $data, $requiredFlag, $creditsOverride) {
            // 1) Create catalog course
            $course = CatalogCourse::create([
                'fldoe_course_code' => $data['fldoe_course_code'] ?? null,
                'course_number'     => $data['course_number'] ?? null,
                'title'             => $data['title'],
                'default_credits'   => $data['default_credits'] ?? null,
            ]);

            // 2) Link into curriculum (curriculum_courses)
            $curriculumCourse = CurriculumCourse::create([
                'curriculum_type_id' => $curriculumType->id,
                'course_id'          => $course->id,
                'category_id'        => $data['category_id'] ?? null,
                'required_flag'      => $requiredFlag,
                'requirement_text'   => $data['requirement_text'] ?? null,
                'notes'              => $data['notes'] ?? null,
            ]);

            // 3) Type-specific tables

            // AP
            if ($curriculumType->code === 'AP') {
                ApDetail::create([
                    'course_id'       => $course->id,
                    'ap_subject_code' => $data['ap_subject_code'],
                    'ap_exam_code'    => $data['ap_exam_code'],
                ]);
            }

            // ESOL
            if ($curriculumType->code === 'ESOL') {
                EsolDetail::create([
                    'course_id'  => $course->id,
                    'lld_level'  => $data['lld_level'],
                    'cefr_level' => $data['cefr_level'],
                ]);
            }

            // CLEP
            if ($curriculumType->code === 'CLEP') {
                ClepDetail::create([
                    'course_id' => $course->id,
                ]);
            }

            // 4) Save FILES (if any)
            $files  = request()->input('resource_files', []);
            $labels = request()->input('resource_files_labels', []);

            if (is_array($files)) {
                foreach ($files as $index => $uploadedFile) {
                    if (!$uploadedFile) {
                        continue;
                    }
                    CourseFile::create([
                        'course_id'     => $course->id,
                        'label'         => isset($labels[$index]) ? $labels[$index] : null,
                        'stored_path'   => $uploadedFile,
                    ]);
                }
            }

            // 5) Save VIDEOS (if any)
            $videoTitles = request()->input('video_titles', []);
            $videoUrls   = request()->input('video_urls', []);

            if (is_array($videoUrls)) {
                foreach ($videoUrls as $index => $url) {
                    $title = isset($videoTitles[$index]) ? trim($videoTitles[$index]) : null;
                    $url   = trim((string) $url);

                    // skip completely empty rows
                    if ($url === '' && ($title === '' || $title === null)) {
                        continue;
                    }

                    if ($title === '' || $title === null) {
                        $title = 'Video ' . ($index + 1);
                    }

                    CourseVideo::create([
                        'course_id' => $course->id,
                        'title'     => $title,
                        'url'       => $url,
                        'position'  => $index,
                    ]);
                }
            }
        });

        return redirect()
            ->back()
            ->with('success_message', 'Course created successfully and linked to curriculum type: ' . $curriculumType->code);
    }

    public function editEnrollmentCoursePage(Request $request, $course_id) {
        $course = CatalogCourse::where('id', $course_id)->first();
        $curriculumTypes = CurriculumType::get();
        $categories = CourseCategory::get();

        $currentCurriculumTypeId = $course->curriculumTypes->first()->pivot->curriculum_type_id;
        $currentCategoryId = $course->curriculumTypes->first()->pivot->category_id;
        $currentRequiredFlag = $course->curriculumTypes->first()->pivot->required_flag;
        $currentRequirementText = $course->curriculumTypes->first()->pivot->requirement_text;

        $courseFiles = $course->files;
        $courseVideos = $course->videos;

        return view('admin.edit-enrollment-course')
            ->with('course', $course)
            ->with('curriculumTypes', $curriculumTypes)
            ->with('categories', $categories)
            ->with('currentCurriculumTypeId', $currentCurriculumTypeId)
            ->with('currentCategoryId', $currentCategoryId)
            ->with('currentRequiredFlag', $currentRequiredFlag)
            ->with('currentRequirementText', $currentRequirementText)
            ->with('courseFiles', $courseFiles)
            ->with('courseVideos', $courseVideos);
    }

    public function updateEnrollmentCourse(Request $request, $course_id) {
        $course = CatalogCourse::with('curriculumTypes')->findOrFail($course_id);
        
        // Curriculum type chosen in the edit form
        $curriculumType = CurriculumType::findOrFail($request->input('curriculum_type_id'));

        // Base validation rules
        $rules = [
            'curriculum_type_id' => ['required', 'exists:curriculum_types,id'],
            'title'              => ['required', 'string', 'max:255'],
            'fldoe_course_code'  => ['nullable', 'string', 'max:20'],
            'course_number'      => ['nullable', 'string', 'max:20'],
            'default_credits'    => ['nullable', 'numeric', 'min:0'],
            'category_id'        => ['nullable', 'exists:course_categories,id'],
            'required_flag'      => ['nullable', 'boolean'],
            'requirement_text'   => ['nullable', 'string', 'max:255'],
            'notes'              => ['nullable', 'string'],

            // files (links)
            'resource_files'          => ['nullable', 'array'],
            'resource_files.*'        => ['nullable', 'string'], // you can add url rule if all are URLs
            'resource_files_labels'   => ['nullable', 'array'],
            'resource_files_labels.*' => ['nullable', 'string', 'max:255'],

            // videos
            'video_titles'       => ['nullable', 'array'],
            'video_titles.*'     => ['nullable', 'string', 'max:255'],
            'video_urls'         => ['nullable', 'array'],
            'video_urls.*'       => ['nullable', 'url', 'max:2048'],
        ];

        // Type-specific validation
        switch ($curriculumType->code) {
            case 'AP':
                $rules = array_merge($rules, [
                    'ap_subject_code' => ['required', 'string', 'max:20'],
                    'ap_exam_code'    => ['required', 'string', 'max:10'],
                ]);
                break;

            case 'ESOL':
                $rules = array_merge($rules, [
                    'lld_level'  => ['required', 'string', 'max:50'],
                    'cefr_level' => ['required', 'string', 'max:10'],
                ]);
                break;

            case 'CLEP':
                // no extra fields
                break;
        }

        $data = $request->validate($rules);

        $requiredFlag = isset($data['required_flag']) ? (bool) $data['required_flag'] : false;

        DB::transaction(function () use ($course, $curriculumType, $data, $requiredFlag) {

            /**
             * 1) Update CatalogCourse
             */
            $course->update([
                'fldoe_course_code' => $data['fldoe_course_code'] ?? null,
                'course_number'     => $data['course_number'] ?? null,
                'title'             => $data['title'],
                'default_credits'   => $data['default_credits'] ?? null,
            ]);

            /**
             * 2) Update curriculum link row
             * Your add method uses CurriculumCourse::create(), so we update or create that row.
             */
            $curriculumCourse = CurriculumCourse::updateOrCreate(
                [
                    'course_id' => $course->id,
                    // IMPORTANT: if you allow a course to be in multiple curriculum types,
                    // this key is correct. If it must be only ONE type, see note below.
                    'curriculum_type_id' => $curriculumType->id,
                ],
                [
                    'category_id'      => $data['category_id'] ?? null,
                    'required_flag'    => $requiredFlag,
                    'requirement_text' => $data['requirement_text'] ?? null,
                    'notes'            => $data['notes'] ?? null,
                ]
            );

            /**
             * OPTIONAL cleanup:
             * If a course is supposed to belong to ONLY ONE curriculum type,
             * delete other curriculum_course rows for that course.
             */
            CurriculumCourse::where('course_id', $course->id)
                ->where('curriculum_type_id', '!=', $curriculumType->id)
                ->delete();

            /**
             * 3) Type-specific details (update/create + cleanup others)
             */
            if ($curriculumType->code === 'AP') {
                ApDetail::updateOrCreate(
                    ['course_id' => $course->id],
                    [
                        'ap_subject_code' => $data['ap_subject_code'],
                        'ap_exam_code'    => $data['ap_exam_code'],
                    ]
                );

                // cleanup other types
                EsolDetail::where('course_id', $course->id)->delete();
                ClepDetail::where('course_id', $course->id)->delete();
            }
            elseif ($curriculumType->code === 'ESOL') {
                EsolDetail::updateOrCreate(
                    ['course_id' => $course->id],
                    [
                        'lld_level'  => $data['lld_level'],
                        'cefr_level' => $data['cefr_level'],
                    ]
                );

                ApDetail::where('course_id', $course->id)->delete();
                ClepDetail::where('course_id', $course->id)->delete();
            }
            elseif ($curriculumType->code === 'CLEP') {
                ClepDetail::updateOrCreate(
                    ['course_id' => $course->id],
                    []
                );

                ApDetail::where('course_id', $course->id)->delete();
                EsolDetail::where('course_id', $course->id)->delete();
            }
            else {
                // generic types -> remove all type detail rows
                ApDetail::where('course_id', $course->id)->delete();
                EsolDetail::where('course_id', $course->id)->delete();
                ClepDetail::where('course_id', $course->id)->delete();
            }

            /**
             * 4) Replace FILE links (course_files)
             */
            CourseFile::where('course_id', $course->id)->delete();

            $files  = $data['resource_files'] ?? [];
            $labels = $data['resource_files_labels'] ?? [];

            if (is_array($files)) {
                foreach ($files as $index => $link) {
                    $link = trim((string) $link);
                    $label = isset($labels[$index]) ? trim((string) $labels[$index]) : null;

                    // skip completely empty rows
                    if ($link === '' && ($label === '' || $label === null)) {
                        continue;
                    }

                    CourseFile::create([
                        'course_id'   => $course->id,
                        'label'       => $label ?: null,
                        'stored_path' => $link, // this is your "link to file"
                    ]);
                }
            }

            /**
             * 5) Replace VIDEO links (course_videos)
             */
            CourseVideo::where('course_id', $course->id)->delete();

            $videoTitles = $data['video_titles'] ?? [];
            $videoUrls   = $data['video_urls'] ?? [];

            if (is_array($videoUrls)) {
                foreach ($videoUrls as $index => $url) {
                    $title = isset($videoTitles[$index]) ? trim((string)$videoTitles[$index]) : null;
                    $url   = trim((string)$url);

                    // skip empty rows
                    if ($url === '' && ($title === '' || $title === null)) {
                        continue;
                    }

                    if ($title === '' || $title === null) {
                        $title = 'Video ' . ($index + 1);
                    }

                    CourseVideo::create([
                        'course_id' => $course->id,
                        'title'     => $title,
                        'url'       => $url,
                        'position'  => $index,
                    ]);
                }
            }
        });

        return redirect()
            ->back()
            ->with('success_message', 'Course updated successfully.');
    }


    public function showAmbassadorLinks() {
        $activities = AmbassadorActivity::with(['user', 'action'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.ambassador-program.links')
            ->with('activities', $activities);
    }

    public function updateAmbassadorStatus(Request $request) {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string'
        ]);

        $activity = AmbassadorActivity::findOrFail($request->id);
        $activity->status = $request->status;
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function showAmbassadorRewards() {
        $ambassador_rewards = AmbassadorReward::all();

        return view('admin.ambassador-program.rewards')->with('ambassador_rewards', $ambassador_rewards);
    }

    public function showAddRewardPage() {

        return view('admin.ambassador-program.add-reward');
    }

    public function addReward(Request $request) {
        AmbassadorReward::insert([
            'name' => $request->name,
            'points' => $request->points,
        ]);

        return redirect()->back()->with('success_message','Reward added successfully');
    }

    public function showEditRewardPage(Request $request, $reward_id) {
        $reward = AmbassadorReward::findOrFail($reward_id);

        return view('admin.ambassador-program.edit-single-reward')->with('reward', $reward);
    }

    public function updateReward(Request $request, $id) {
        $reward = AmbassadorReward::findOrFail($id);

        $validated = $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'points' => ['required', 'numeric', 'min:0'],
        ]);

        $reward->update($validated);

        return redirect()
            ->route('admin.ambassador-rewards')
            ->with('success_message', 'Reward updated successfully.');
    }

    // public function deleteReward($id) {
    //     $reward = AmbassadorReward::findOrFail($id);
    //     $reward->delete();

    //     return redirect()
    //         ->route('admin.ambassador-rewards')
    //         ->with('success_message', 'Reward deleted successfully.');
    // }

    public function showActivitiesPage() {
        $ambassador_services = AmbassadorService::all();

        return view('admin.ambassador-program.activities')->with('ambassador_services', $ambassador_services);
    }

    public function showAddActivityPage() {
        $platforms = AmbassadorService::get();

        return view('admin.ambassador-program.add-activity')->with('platforms', $platforms);
    }

    public function addActivity(Request $request) {
        AmbassadorServiceAction::insert([
            'service_id' => $request->platform,
            'name' => $request->name,
            'value' => $request->points,
            'additional_information' => $request->additional_info,
        ]);

        return redirect()->back()->with('success_message','Activity added successfully');
    }

    public function changePassword() {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();

        // 1) Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->withInput();
        }

        // 2) Optional: prevent same password reuse
        if (Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'New password must be different from the current password.']);
        }

        // 3) Save new password (hashed)
        $user->password = Hash::make($request->password);
        $user->save();


        // 4) Regenerate session
        $request->session()->regenerate();

        return back()->with('status', 'Password updated successfully.');
    }

    public function educators(){
        $categories = SubjectArea::all();
        $educators = User::where('role_id',5)->get();
        foreach($educators as $educator){
            $educator->array_educator_categories  = $educator->educator_categories->pluck('category_id')->toArray();
        }
        return view('admin.educators')
            ->with('educators',$educators)
            ->with('categories',$categories);
    }

    public function createEducator(Request $request){
         $request->validate([
            'firstname' => 'required',
            'middlename' => 'nullable',
            'surname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'categories' => 'required'
        ]);
        $educator_role_id = 5;
        $categories = $request->categories;
    
        $password  = Str::random(10);
        $confirmation_code = Str::random(30);
        $educator = User::create([
            'name' => $request->firstname,
            'surname' => $request->surname,
            'middlename' => $request->middlename,
            'email' => $request->email,
            'role_id' => $educator_role_id,
            'password' => Hash::make($password),
            'confirmation_code' => $confirmation_code,
            'is_verified' => 1,
        ]);

        foreach($categories as $category_id){
            EducatorCategory::insert([
                'educator_id' => $educator->id,
                'category_id' => $category_id
            ]);
        }
        try{
            Mail::to($educator->email)->send(new StudentCredentials($educator,$password));
        }catch(\Exception $e){
            info($e->getMessage());
        }
        return redirect()->back()->with('success_message','Educator created successfully');
    }

    public function editEducator(Request $request){
        $educator = $request->except('_token','id');
        $id = $request->id;
        $categories = $request->categories;
        User::find($id)->update($educator);
        EducatorCategory::where('educator_id',$id)->delete();
        foreach($categories as $category_id){
            EducatorCategory::insert([
                'educator_id' => $id,
                'category_id' => $category_id
            ]);
        }
        return redirect()->back()->with('success_message','Educator updated successfully');
    }

    #Using the same view for both help desks
    public function parentHelpDesk(){
        $template = 'admin_template';
        $help_desk = HelpDesk::where('is_parent',1)->get()->groupBy('slug');
        return view('help-desk.inbox')
            ->with('template',$template)
            ->with('help_desk',$help_desk);
    }
    public function studentHelpDesk(){
        $template = 'admin_template';
        $help_desk = HelpDesk::where('is_parent',0)->get()->groupBy('slug');
        return view('help-desk.inbox')
            ->with('template',$template)
            ->with('help_desk',$help_desk);
    }

    public function newHelpDesk(){
        $template = 'admin_template';
        return view('help-desk.new')
            ->with('template',$template);
    }
    
    public function exams(){
        $students = StudentEnrolledCourse::where('status',StudentEnrolledCourse::STATUS_READY_FOR_EXAM)->get();
        $educators = User::where('role_id',5)->get();
        $courses = CurriculumCourse::all();
        $exams = Exam::orderBy('created_at','desc')->get();
        return view('admin.exams')
            ->with('exams',$exams)
            ->with('students',$students)
            ->with('educators',$educators)
            ->with('courses',$courses);
    }
    public function createExam(Request $request){
        $exam = $request->only('date','time','course_id','student_id','educator_id','type','pre_exam');
        $exam['status']=0;
        Exam::create($exam);
        return redirect()->back()->with('success_message','Exam created successfully');
    }
    
    public function studentSpotlight() {
        $students = StudentSpotlight::get();
        $categories = StudentSpotlightsCategory::get();

        return view('admin.students-spotlights')->with('students', $students)->with('categories', $categories);
    }

    public function addStudentSpotlight(Request $request) {
        $image = $this->uploadFile($request->file('picture'),'/public/images/student-spotlight');
        StudentSpotlight::insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);
        return redirect()->back()->with('success_message','Student added successfully');
    }

    public function editStudentSpotlight(Request $request, $student_id) {
        if($request->hasFile('picture')){
            $image = $this->uploadFile($request->file('picture'),'/public/images/student-spotlight');
            StudentSpotlight::where('id', $student_id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image
            ]);
        }
        else {
            StudentSpotlight::where('id', $student_id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description
            ]);
        }
        return redirect()->back()->with('success_message','Student edited successfully');
    }
    
    public function showSubmissions(){
        $exams = Exam::where('status',Exam::STATUS_SUBMITTED)->get();
        return view('admin.submissions')
            ->with('exams',$exams);
    }

    public function showSingleSubmission($exam_id){
        $answers = StudentAnswer::where('exam_id',$exam_id)->get();
        $exam = Exam::find($exam_id);
        return view('admin.single-submission')
            ->with('exam',$exam)
            ->with('answers',$answers); 
    }

    public function evaluateExam(Request $request,$exam_id){
        $exam = Exam::find($exam_id);
        $grade = $request->grade;
        $exam_comment = $request->exam_comment;
        $course = StudentEnrolledCourse::where('user_id',$exam->student_id)->where('catalog_course_id',$exam->course_id)->first();
        if($exam->type == 1){
            $answers_comments = $request->answer_comment;
            foreach($answers_comments as $answer_id => $comment){
                StudentAnswer::find($answer_id)->update(['comment' => $comment]);
            }
        }
        $exam->update([
            'grade' => $grade,
            'comment'=> $exam_comment,
            'status' => Exam::STATUS_EVALUATED
        ]);
        if($grade > 1){
            $exam->update(['passed_at' => Carbon::now()]);
            $course->update(['status' => StudentEnrolledCourse::STATUS_COMPLETED]);
        }
        else{
            $course->update(['status' => StudentEnrolledCourse::STATUS_READY_FOR_EXAM]);
        }

        return redirect()->back()->with('success_message','Exam evaluated successfully');
        
    }

    public function editSingleStudent($student_id) {
        $student = StudentSpotlight::find($student_id);
        $categories = StudentSpotlightsCategory::get();

        return view('admin.edit-single-student')->with('student', $student)->with('categories', $categories);
    }

    public function addExamQuestionsPage(Request $request) {
        $courses = CurriculumCourse::get();
        
        $questions = ExamQuestion::when($request->course_id, function ($query) use ($request) {
           
            $query->where('subject_id', $request->course_id)->where('type',$request->type);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.add-exam-questions')->with('courses', $courses)->with('questions', $questions);
    }

    public function addExamQuestion(Request $request) {
        ExamQuestion::insert([
            'subject_id' => $request->course_id,
            'question' => $request->question,
            'type' => $request->type
        ]);

        return redirect()->back()->with('success_message','Exam question added successfully');
    }

    public function editQuestionPage($question_id) {
        $question = ExamQuestion::where('id', $question_id)->first();

        return view('admin.edit-exam-question')->with('question', $question);
    }

    public function editExamQuestion(Request $request, $question_id) {
        ExamQuestion::where('id', $question_id)->update(['question' => $request->question]);

        return redirect()->back()->with('success_message','Exam question updated successfully');
    }

    public function deleteExamQuestion(Request $request) {
        ExamQuestion::where('id', $request->id)->delete();

        return redirect()->route('admin.add-exam-question')->with('success_message','Exam question deleted successfully');
    }

    public function addSelfAssessmentQuestionPage() {
        $courses = CurriculumCourse::get();
        $questions = SelfAssessmentQuestion::with('course')->orderBy('id', 'desc')->paginate(10);
        return view('admin.add-self-assess-question')->with('courses', $courses)->with('questions', $questions);
    }

    public function materialsByCourse($courseId) {
        $materials = CourseFile::where('course_id', $courseId)
        ->select('id', 'label')
        ->orderBy('label')
        ->get();

        return response()->json($materials);
    }

    public function storeSelfAssessQuestion(Request $request) {
        $request->validate([
            'course_id' => 'required',
            'material_id' => 'required',
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|between:0,3',
        ]);

        // Create question
        $question = SelfAssessmentQuestion::create([
            'course_id' => $request->course_id,
            'material_id' => $request->material_id,
            'question' => $request->question,
        ]);

        // Create answers
        foreach ($request->answers as $index => $answer) {
            SelfAssessmentAnswer::create([
                'question_id' => $question->id,
                'answer' => $answer,
                'is_correct' => ($index == $request->correct_answer),
            ]);
        }

        return redirect()->back()->with('success_message', 'Self-assessment question added successfully.');
    }

    public function editSelfAssessmentQuestionPage($question_id) {
        $question = SelfAssessmentQuestion::with('answers')->findOrFail($question_id);
        $courses = CatalogCourse::all();

        return view('admin.edit-self-assess-question')->with('question', $question)->with('courses', $courses);
    }

    public function editSelfAssessmentQuestion(Request $request, $id) {
        $request->validate([
            'course_id' => 'required',
            'material_id' => 'required',
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'correct_answer' => 'required|integer|between:0,3',
        ]);

        $question = SelfAssessmentQuestion::with('answers')->findOrFail($id);

        $question->update([
            'course_id' => $request->course_id,
            'material_id' => $request->material_id,
            'question' => $request->question,
        ]);

        foreach ($question->answers as $index => $answer) {
            $answer->update([
                'answer' => $request->answers[$index],
                'is_correct' => $index == $request->correct_answer
            ]);
        }

        return redirect()->back()->with('success_message', 'Question updated successfully.');
    }

    public function deleteSelfAssessmentQuestion($id) {
        $question = SelfAssessmentQuestion::with('answers')->findOrFail($id);

        // Delete all answers first
        $question->answers()->delete();

        // Then delete the question
        $question->delete();

        return redirect()->back()->with('success_message', 'Question and its answers deleted successfully.');
    }
    
     public function diplomaRequests(){
        $diploma_requests = DiplomaPrintingRequest::orderBy('id','desc')->get();
        return view('admin.diploma-requests')
            ->with('diploma_requests',$diploma_requests);
    }

    public function transfer(Request $request,$course_id){
        $course = CurriculumCourse::find($course_id);

        $student = User::with('active_plan')->find($request->student_id);
        StudentEnrolledCourse::insert([
            'user_id' => $request->student_id,
            'catalog_course_id' => $course->id,
            'created_at' => Carbon::now(),
            'status' => StudentEnrolledCourse::STATUS_COMPLETED
        ]);

        return redirect()->back()->with('success_message','Course transferred successfully');
    }
    public function transferBack(Request $request,$course_id){
        StudentEnrolledCourse::where('catalog_course_id',$course_id)->delete();
        return redirect()->back()->with('success_message','The course was transferred back successfully');
    }

    public function requestedLeavesPage() {
        $leaveRequests = LeaveRequest::orderByDesc('created_at')->paginate(10);

        return view('admin.leaves.requested-leaves')->with('leaveRequests', $leaveRequests);
    }

    public function singleLeaveRequestPage(Request $request, $request_id) {
        $leaveRequest = LeaveRequest::where('id', $request_id)->first();

        return view('admin.leaves.single-leave-request')->with('leaveRequest', $leaveRequest);
    }

    public function approveLeaveRequest(Request $request, $request_id) {
        $leave = LeaveRequest::findOrFail($request_id);

        $leave->update([
            'status' => LeaveRequest::STATUS_APPROVED
        ]);

        $statusText = $leave->status_text;

        $admin = User::where('role_id', 1)->first();
        try{
            Mail::to($admin->email)->send(new LeaveRequestAnswer($statusText));
        }catch(\Exception $e){
            info($e->getMessage());
        }

        Notification::add(
            auth()->id(),
            'You successfully approve a leave request.'
        );

        return back()->with('success_message', 'Request approved');
    }

    public function denyLeaveRequest(Request $request, $request_id) {
        $leave = LeaveRequest::findOrFail($request_id);

        $leave->update([
            'status' => LeaveRequest::STATUS_DENIED
        ]);

        $statusText = $leave->status_text;

        $admins = User::where('role_id', 1)->get();
        foreach($admins as $admin) {
            try{
                Mail::to($admin->email)->send(new LeaveRequestAnswer($statusText));
            }catch(\Exception $e){
                info($e->getMessage());
            }
        }

        Notification::add(
            auth()->id(),
            'You successfully denied a leave request.'
        );

        return back()->with('success_message', 'Request denied');
    }
    
    public function ChangeDiplomaPrintingStatus(Request $request,$diploma_request_id){
        $diploma_request = DiplomaPrintingRequest::find($diploma_request_id);
        $diploma_request->update(['status' => $diploma_request->status+1]);
        return redirect()->back()->with('success_message','Diploma request updated successfully');
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

        return view('admin.all-notifications')->with('notifications', $notifications);
    }
    public function getCourses(Request $request){
        $student_id = $request->student_id;
                
        $courses = StudentEnrolledCourse::with('course.course')->where('user_id',$student_id)
            ->where('status',StudentEnrolledCourse::STATUS_READY_FOR_EXAM)
            ->get();
        return $courses;
    }
}
