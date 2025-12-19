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

use App\Http\Requests\CreateConferenceRequest;
use App\Http\Requests\AiServiceRequest;

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
        
            info($e);
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
        $authors = DynamicNewsAuthor::with('all_translations')->get();
        
        return view('admin.edit_authors')
            ->with('authors',$authors);
    }
    
    public function editAuthorNews(Request $request,$author_id){
        $input = $request->all();
        
        foreach(Config('languages') as $lang => $language){
            DynamicNewsAuthorTranslation::where('author_id',$author_id)->where('locale',$lang)->update([
                'name' => $input['name_'.$lang],
                'occupation' => $input['occupation_'.$lang],            
                'description' => $input['description_'.$lang]
            ]);
        }
        return redirect()->back()->with('success_message','Author edited successfully!');
    }

    public function addAuthorNews(Request $request){
        
        $request->validate([
            'picture' => 'max:300'
        ]);
        $image = $request->file('picture');
        $input = $request->all();

        $pictureName = $image->getClientOriginalName();
        $destinationPath = public_path('/images/');     
        $firstValue = is_array($input) && count($input) > 0 ? reset($input) : null;  
        $firstValueDescription = is_array($input) && count($input) > 0 ? reset($input) : null;  

        if(DynamicNewsAuthor::where('name', '=', $firstValue)->exists()){
            return redirect()->back()->with('error','Author exist!');
        }
        $author_id = DynamicNewsAuthor::insertGetId([
            'name' => $firstValue,
            'description' => $firstValue,
        ]);
    
        DynamicNewsAuthorTranslation::insert([
            'locale' => 'en',
            'description' => $request->description_en,
            'occupation' => $request->occupation_en,
            'author_id' => $author_id,
            'name' => $request->name_en,
            'slug' => $request->slug_en,
            'avatar' => $pictureName 
        ]);
        
        DynamicNewsAuthorTranslation::insert([
            'locale' => 'de',
            'description' => $request->description_de,
            'occupation' => $request->occupation_de,
            'author_id' => $author_id,
            'name' => $request->name_de,
            'slug' => $request->slug_de,
            'avatar' => $pictureName 
        ]);
        $image->move($destinationPath, $pictureName);

        $nickname = 'author-'.$author_id;
        
        $path = '/images/'.$pictureName;
        $this->createImage($nickname,$path);

        return redirect()->back()->with('success_message','Author added successfully!');
    }

    public function deleteAuthor($id){
        $author = DynamicNewsAuthor::find($id);
        $this->deleteImage('author-'.$id);
        DynamicNewsAuthor::where('id',$id)->delete();
        DynamicNewsAuthorTranslation::where('author_id',$id)->delete();
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
        return redirect()->back()->with('success_message','Course created successfully');
     }

     public function editCourse($course_id){
        $course = CourseType::find($course_id);
        $courses = CourseType::all();
        return view('admin.edit-single-course')
            ->with('courses',$courses)
            ->with('course',$course);
     }

     public function updateCourse(Request $request, $course_id){
        $course = $request->except('_token');
        Course::find($course_id)->update($course);
        return redirect()->back()->with('success_message','Course updated successfully');
     } 
    public function courses(){
        $courses = Course::all();
        return view('admin.courses')
            ->with('courses',$courses);
     }
     public function addCourse(Request $request){
        $course = $request->only('name','description','price');
        $course['type'] = 0;
        $course = Course::create($course);
        $file = $request->file('image');
        $pic_name = $file->getClientOriginalName();
        $request->file('image')->move(base_path()."/public/images/courses", $pic_name);
        $nickname = 'course-'.$course->id;
        $path = "/images/courses/".$pic_name;
        $this->createImage($nickname,$path);
        return redirect()->back()->with('success_message','Course created successfully');
     }

    //  public function editCourse($course_id){
    //     $course = Course::find($course_id);
    //     $courses = Course::all();
    //     return view('admin.edit-single-course')
    //         ->with('courses',$courses)
    //         ->with('course',$course);
    //  }

    //  public function updateCourse(Request $request, $course_id){
    //     $course = $request->except('_token');
    //     Course::find($course_id)->update($course);
    //     return redirect()->back()->with('success_message','Course updated successfully');
    //  }

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
        Log::info($request);
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
            'resource_files'           => ['nullable', 'array'],
            'resource_files.*'         => ['nullable', 'max:51200'], // ~50MB
            'resource_files_labels'    => ['nullable', 'array'],
            'resource_files_labels.*'  => ['nullable', 'string', 'max:255'],

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
            $files  = request()->file('resource_files', []);
            $labels = request()->input('resource_files_labels', []);

            if (is_array($files)) {
                foreach ($files as $index => $uploadedFile) {
                    if (!$uploadedFile) {
                        continue;
                    }
                    Log::info($uploadedFile);
                    $path = $this->uploadFile($uploadedFile, '/public/courses_files');

                    CourseFile::create([
                        'course_id'     => $course->id,
                        'label'         => isset($labels[$index]) ? $labels[$index] : null,
                        'original_name' => $uploadedFile->getClientOriginalName(),
                        'stored_path'   => '/public/courses_files/'.$path,
                        'mime_type'     => $uploadedFile->getClientMimeType(),
                        'position'      => $index,
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

        return view('admin.edit-enrollment-course')->with('course', $course)->with('curriculumTypes', $curriculumTypes)->with('categories', $categories);
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

    public function addReward() {

        return redirect()->back();
    }

    public function showActivitiesPage() {
        $ambassador_services = AmbassadorService::all();

        return view('admin.ambassador-program.activities')->with('ambassador_services', $ambassador_services);
    }

    public function showAddActivityPage() {

        return view('admin.ambassador-program.add-activity');
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

}
