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
use App\AiUser;
use App\AiService;
use App\AiCategory;
use App\AiText;

use App\Http\Requests\CreateConferenceRequest;
use App\Http\Requests\AiServiceRequest;

use App\Mail\AIUserMail;

class AdminController extends Controller
{

   private function uploadFile($file,$path){
    $filename = $file->getClientOriginalName();
    $file->move(base_path().$path, $filename);
    return $filename;
    }
   private function createImage($nickname,$path){

        $image_id = Image::insertGetId([
            'nickname' => $nickname,
            'src' => $path

        ]);
        foreach(Config('languages') as $lang => $language) {
            ImageAttribute::insert([
                'alt'=> '-',
                'title'=> '-',
                'image_id'=>$image_id,
                'locale' => $lang,
            ]);
        }
   }

   private function deleteImage($nickname){
        $image = Image::where('nickname', $nickname)->first();

        try{
            unlink(base_path().'/public/'.$image->src);
            Image::find($image->id)->delete();
            ImageAttribute::where('image_id', $image->id)->delete();
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
        return view('admin.welcome', ['text_pages' => $request->all()['text_pages']]);
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

    public function showAdminAllConferences(Request $request) {
        $conferences = Conference::orderBy('id', 'desc')->get();
        return view('admin.all_conferences', ['text_pages' => $request->all()['text_pages'], 'conferences' => $conferences]);
    }

    public function showAdminEditConference(Request $request, $id) {
        $conference = Conference::where('id', '=', $id)->first();
        return view('admin.edit_conference', ['text_pages' => $request->all()['text_pages'], 'conference' => $conference]);
    }


    public function editConferencePost(Request $request, $id) {
        #todo Validation
        $input = $request->except(['text_pages']);

        Conference::where('id', '=', $id)->update([
            'date_from' => $input['date_from'], 
            'date_to' => $input['date_to'], 
            'application_deadline' => $input['application_deadline'], 
            'places' => $input['places'], 
            'updated_at' => Carbon::now()->format("d.m.Y")
        ]);

        foreach(Config('languages') as $lang => $language){

            ConferenceTranslation::where("conference_id",$id)->where("locale",$lang)->update([
                'heading' => $input['heading_'.$lang],
                'long_description' => $input['long_description_'.$lang],
                'short_description' => $input['short_description_'.$lang],
                'slug' => $input['slug_'.$lang],
            ]);
        }

        return redirect()->back()->with('success_message', 'Conference was updated Successfully.'); 
    }

    public function deleteConference($id){
        
        Conference::find($id)->delete();
        ConferenceTranslation::where('conference_id', '=', $id)->delete();
        $this->deleteImage('conference-'.$id);
        return redirect()->route('all-conferences')->with('success_message', 'Conference was deleted successfully.');
        
    }

    public function showAdminAddNewConference(Request $request) {
        return view('admin.add_new_conference', ['text_pages' => $request->all()['text_pages']]);
    }

    public function publishAdminNewConference(CreateConferenceRequest $request) {
        $input = $request->validated();
        $file = $request->file('picture');
        $pic_name = $file->getClientOriginalName();
        $request->file('picture')->move(base_path()."/public/images/", $pic_name);
        $id = Conference::insertGetId([
            'date_from' => $input['date_from'],
            'date_to' => $input['date_to'],
            'application_deadline' => $input['application_deadline'],
            'places' => $input['places'],
            'created_at' => Carbon::now()->format("Y.m.d")
        ]);

        foreach(Config('languages') as $lang => $language){

            ConferenceTranslation::insert([
                'conference_id' => $id,
                'heading' => $input['heading_'.$lang],
                'long_description' => $input['long_description_'.$lang],
                'short_description' => $input['short_description_'.$lang],
                'locale' => $lang,
                'slug' => $input['slug_'.$lang],
            ]);
        }

        $nickname = 'conference-'.$id;
        $path = "/images/".$pic_name;
        $this->createImage($nickname,$path);
        
        return redirect()->back()->with('success_message', 'Conference was successfully added.');
    } 

    public function showAdminAllPublications(Request $request) {
        $publications = Publication::orderBy('id', 'desc')->get();
        return view('admin.all_publications', ['text_pages' => $request->all()['text_pages'], 'publications' => $publications]);
    }

    public function showAdminEditPublication(Request $request, $id) {
        $publication = Publication::where('id', '=', $id)->first();
        return view('admin.edit_publication', ['text_pages' => $request->all()['text_pages'], 'publication' => $publication]);
    }

    public function deletePublication($id) {
       
        Publication::find($id)->delete();
        PublicationTranslation::where('publication_id',$id)->delete();
        $this->deleteImage('publication-'.$id);
        return redirect()->route('all-publications')->with('success_message', 'Publication was successfully deleted.');
    }
	
    public function editPublicationPost(Request $request, $id) {

        $input = $request->except(['text_pages']);
            
        Publication::where('id', $id)->update([
            'pages' => $input['pages'],
            'edition' => $input['edition'], 
            'year' => $input['year'],
            'created_at' => Carbon::now()->format("d.m.Y")
        ]);

        foreach(Config('languages') as $lang => $language){
            $publication_same_slug = PublicationTranslation::where('locale', $lang)->where('slug', $input['slug_'.$lang])->where('publication_id' , '!=', $id)->exists();
            if ($publication_same_slug == 1) {
                return redirect()->back()->with('error','The slug already exists!');
            }
            PublicationTranslation::where('publication_id',$id)->where('locale',$lang)->update([
                'ISBN' => $input['isbn_'.$lang],
                'heading' => $input['heading_'.$lang],
                'summary' => $input['summary_'.$lang],
                'language' => $input['language_'.$lang],
                'slug' => $input['slug_'.$lang],
                'authors' => $input['authors_'.$lang]
            ]);
        }

        return redirect()->back()->with('success_message', 'Publication was successfully updated.');
      
    }
	
    public function showAdminAddNewPublication(Request $request) {
        return view('admin.add_new_publication', ['text_pages' => $request->all()['text_pages']]);
    }

    public function publishAdminNewPublication(Request $request) {
        $request->validate([
            'picture' => 'max:300'
        ]);
        $input = $request->except(['text_pages']);
       
        if($request->hasFile('picture')) {
            $file = $request->file('picture');
            $pic_name = $file->getClientOriginalName();
            $request->file('picture')->move(base_path()."/public/images/", $pic_name);
          
            $publication_id = Publication::insertGetId([
                'pages' => $input['pages'],
                'edition' => $input['edition'], 
                'year' => $input['year'],
                'created_at' => Carbon::now()->format("d.m.Y")
            ]);

            foreach(Config::get('languages') as $lang => $language){
                $publication_same_slug = PublicationTranslation::where('locale', $lang)->where('slug', $input['slug_'.$lang])->exists();
                if ($publication_same_slug == 1) {
                    $publication_id_remove = Publication::where('id', $publication_id)->delete();
                    return redirect()->back()->with('error','The slug already exists!');
                }

                PublicationTranslation::insert([
                    'publication_id' => $publication_id,
                    'locale' => $lang,
                    'ISBN' => $input['isbn_'.$lang],
                    'heading' => $input['heading_'.$lang],
                    'summary' => $input['summary_'.$lang],
                    'language' => $input['language_'.$lang],
                    'slug' => $input['slug_'.$lang],
                    'authors' => $input['authors_'.$lang]
                ]); 
            }
            $path = "/images/" . $pic_name;
            $nickaname = 'publication-'.$publication_id;
            $this->createImage($nickaname,$path);
        }
        return redirect()->back()->with('success_message', 'Publication was successfully updated.');
    }

    public function getAdminAcademics(){
        $academics = Academic::all();
        return view('admin.academics')
            ->with('academics',$academics);
    }

    public function addAcademic(Request $request){
        $request->validate([
            'picture' => 'max:300'
        ]);
        $image = $request->file('picture');
        $input = $request->all();
        $pictureName = $image->getClientOriginalName();
        $destinationPath = public_path('/images/');       
        $academic_id = Academic::insertGetId([
            'created_at' => Carbon::now()
        ]);

        foreach(Config('languages') as $lang => $language){

            AcademicTranslation::insert([
                'academic_id' => $academic_id,
                'name' => $input['name-'.$lang],
                'locale' => $lang,
                'description' =>$input['description-'.$lang],
            ]);
        }
        $image->move($destinationPath, $pictureName);

        $nickname = 'academic-'.$academic_id;
        $path = '/images/'.$pictureName;
        $this->createImage($nickname,$path);

        return redirect()->back()->with('success_message','Academic added successfully');
    }

    public function editAcademic(Request $request){
        $input = $request->all();
        foreach(Config('languages') as $lang => $language) {
            AcademicTranslation::where('locale',$lang)->where('academic_id',$request->id)->update([
                'name' => $input['name-'.$lang],
                'description' => $input['description-'.$lang],
            ]);
        }
        
        return redirect()->back()->with('success_message','Academic edited successfully');
    }

    public function deleteAcademic($id){
        $academic = Academic::find($id);
       	$this->deleteImage('academic-'.$id);
        Academic::where('id',$id)->delete();
        AcademicTranslation::where('academic_id',$id)->delete();
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
        $text_de = $request->text_de;
        // $text_bg = $request->text_bg;
        // $text_es = $request->text_es;
        // $text_ru = $request->text_ru;

        for($i=0;$i<count($ids);$i++){
            
            Text::where('id',$ids[$i])->update([
                'text_en'=> $text_en[$i],
                'text_de'=> $text_de[$i],
                // 'text_bg'=> $text_bg[$i],
                // 'text_es'=> $text_es[$i],
                // 'text_ru'=> $text_ru[$i],
            ]);
        }
       

        return redirect()->back()->with('success_message','The text was successfully updated');
    }

    public function adminPartners(){
        $partners = Partner::all();
        return view('admin.partners')
                ->with('partners',$partners);
    }
	
	public function showTutorials(){
        $help_desk_tutorials = Tutorial::where('type',0)->get();
        $program_tutorials = Tutorial::where('type',1)->get();
        $programs = Program::all();
        return view('admin.tutorials',compact('help_desk_tutorials','program_tutorials','programs'));
    } 

    public function addTutorial(Request $request){
        $type = $request->type ?? 0;
        $input = $request->all();
        $tutorial_id = Tutorial::insertGetId(['type' => $type]);
        foreach(Config('languages') as $lang => $language){

           $slug = $type == 1 
                ? ProgramTranslation::where('program_id',$input['program'])->where('locale',$lang)->first()->slug 
                : $input['slug_'.$lang];

            $tutorial_same_slug = TutorialTranslation::where('locale', $lang)->where('slug', $input['slug_'.$lang])->exists();
            if ($tutorial_same_slug == 1) {
                $tutorial_id_remove = Tutorial::where('id', $tutorial_id)->delete();
                return redirect()->back()->with('error','The slug already exists!');
            }

            $translation_id = TutorialTranslation::insertGetId([
                'video' => $input['video_'.$lang],
                'name' => $input['name_'.$lang],
                'slug' => $slug,
                'tutorial_id' => $tutorial_id,
                'text' => $input['text_'.$lang],
                'locale' => $lang
            ]);
            if($type == 0){
                $request->validate([
                    'cover_'.$lang => 'max:300'
                ]);
                $image = $request->file('cover_'.$lang);
                $pictureName = $image->getClientOriginalName();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $pictureName);
               
                $nickname = 'tutorial-'.$lang.'-'.$tutorial_id;
                $path = '/images/'.$pictureName;
                $this->createImage($nickname,$path);
            }           
        }

        return redirect()->back();
    }
    public function editTutorial($tutorial_id){
        $tutorial = Tutorial::find($tutorial_id);
        $programs = Program::all();
        return view('admin.edit-tutorial')
                ->with('programs',$programs)
                ->with('tutorial',$tutorial);
    }

    public function editTutorialPost(Request $request,$tutorial_id){
        $input = $request->all();
        $tutorial = Tutorial::find($tutorial_id);
      
        foreach(Config('languages') as $lang => $language){

            $slug = $tutorial->type == 1 
            ? ProgramTranslation::where('program_id',$input['program'])->where('locale',$lang)->first()->slug 
            : $input['slug_'.$lang];

            TutorialTranslation::where('tutorial_id',$tutorial_id)->where('locale',$lang)->update([
                'name' =>$input['name_'.$lang],
                'text' =>$input['text_'.$lang],
                'slug' =>$slug
            ]);
        }

        return redirect()->back()->with('success_message','Tutorial edited successfully!');
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
            FaqCategoryTranslation::where('category_id',$category_id)->where('locale',$lang)->update([

                  'name' => $input['name_'.$lang],
                  'slug' => $input['slug_'.$lang],
                  'meta_title' => $input['meta_title_'.$lang],
                  'meta_description' => $input['meta_description_'.$lang]  
            ]);
        }

        return redirect()->back()->with('success_message','Data successfuly updated');
    }

    public function getFaqByCategory(Request $request, $category_id) {
        $faqs = Faq::where('category_id', $category_id)->with('all_translations')->get();
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

    public function jobs(){
        $jobs = Job::all();
        $job_categories = JobCategory::all();
        $job = null;
        return view('admin.jobs')
            ->with('job_categories',$job_categories)
            ->with('job',$job)
            ->with('jobs',$jobs);
    }

    public function addJob(Request $request){
        $request->validate([
            "slug" => 'required',
            "slug_de" => 'required',
            "name" => 'required',
            "name_de" => 'required',
            "description" => 'required',
            "description_de" => 'required',
            "meta_title" => 'required',
            "meta_title_de" => 'required',
            "meta_description" => 'required',
            "meta_description_de" => 'required',
            "category_id" => 'required',
            "id" => 'sometimes',
            "cover" => 'sometimes'
        ]);

        if($request->cover){
            $image = $request->file('cover');
            $pictureName = $image->getClientOriginalName();
            $destinationPath = public_path('/images/');   
            $image->move($destinationPath, $pictureName);
            $nickname = 'job-'.Job::max('id') + 1;
            $path = '/images/'.$pictureName;
            $this->createImage($nickname,$path);
        }
        $job = $request->except('_token','text_pages');
        Job::updateOrCreate(['id' => $job['id']],$job);
        return redirect()->back()->with('success_message','Job created successfully');
    }
    public function deleteJob($id){
        Job::where('id',$id)->delete();
        return redirect()->back();
    }

    public function jobsCategories(){
        $job_categories = JobCategory::all();
        return view('admin.job-categories')
            ->with('job_categories',$job_categories);
    }

    public function addJobCategory(Request $request){
        $category = $request->only('name','name_de');
        JobCategory::create($category);
        return redirect()->back()->with('success_message','Job category created successfully');
    }
    public function editJobCategory(Request $request,$category_id){
        $category = $request->only('name','name_de');
        JobCategory::where('id',$category_id)->update($category);
        return redirect()->back()->with('success_message','Job category updated successfully');
    }

    public function deleteJobCategory($category_id){
        JobCategory::where('id',$category_id)->delete();
        return redirect()->back()->with('success_message','Job category deleted successfully');
    }

    public function editSingleJob($job_id){
        $job = Job::find($job_id);
        $jobs = Job::all();
        $job_categories = JobCategory::all();
        return view('admin.jobs')
            ->with('job',$job)
            ->with('job_categories',$job_categories)
            ->with('jobs',$jobs);
    }

    public function aiUsers (){
        $ai_users = AiUser::all();
        return view('admin.ai.users')
            ->with('ai_users',$ai_users);
    }

    public function aiServices(){
        $services = AiService::paginate(10);
        $categories = AiCategory::all();
        return view('admin.ai.services')
                ->with('categories',$categories)
                ->with('services',$services);
    }

    public function addAiUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tokens' => 'required',
        ]);
        if(AiUser::where('email',$request->email)->count() > 0){
            return redirect()->back()->with('wront_message','The user already exists');
        }
        $user = $request->only('name','email','tokens');
        $password = Str::random(10);
        $user['password'] = Hash::make($password);
        //email to user
        $email_data = AiUser::create($user);
        $email_data['password'] = $password;
        try{
            Mail::to($user['email'])->send(new AIUserMail($email_data));
        }catch(\Exception $e){
            info($e->getMessage());
        }

        return redirect()->back()->with('success_message','The user was created successfully');
    }

    public function editAiUser(Request $request, $id){
        $user = $request->only('name','email','tokens');
        AiUser::where('id',$id)->update($user);
        return redirect()->back()->with('success_message','The user was updated successfully');
    }
    public function addAiService(AiServiceRequest $request){
        $service = $request->validated();
        AiService::create($service);
        return redirect()->back()->with('success_message','The service was created successfully');
    }
    public function editAiService(AiServiceRequest $request,$id){
        $service = $request->validated();
        AiService::where('id',$id)->update($service);
        return redirect()->back()->with('success_message','The service was updated successfully');
    }

    public function deleteAiService($id) {
        AiService::where('id',$id)->delete();
        return redirect()->back()->with('success_message','The service was deleted successfully');
    }
     public function aiTexts(){
        $texts = AiText::all();
        return view('admin.ai.texts')
            ->with('texts',$texts);
     }

     public function editAiTexts(Request $request){
        
        $text_en = $request->text_en;
        $text_de = $request->text_de;
        $ids = $request->ids;

        foreach($ids as  $i => $id){
            AiText::where('id',$id)->update([
                'text_en' => $text_en[$i],
                'text_de' => $text_de[$i]
            ]);
        }

         return redirect()->back()->with('success_message','The texts have been updated successfully'); 
     }
}
