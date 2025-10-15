<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Config;

use App\Program;
use App\ProgramTranslation;
use App\Study;
use App\Partner;
use App\StudyTranslation;
use App\Image;
use App\ImageAttribute;
use App\ProgramVideo;
use App\ProgramBenefit;
use App\ProgramIsoText;
use App\IsoIcon;
use App\AiSupport;
use App\ProgramFact;
use App\StudyProgramContent;
use App\StudyRequirements;
use App\RequiredDocuments;
use App\TuitionFee;
use App\Financing;
use App\CareerPath;
use App\PartnerText;
use App\ProgramTestimonial;
use App\KnowledgeForSuccess;
use App\Job;
use App\JobCategory;
use App\ProgramJob;
use App\ProgramJobCategory;
use App\StudyProgramAccordion;
use App\FinancingAccordion;

class AdminProgramController extends Controller
{

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

    public function studies(){
        $studies = Study::with('all_translations')->get();
        return view('admin.studies')
            ->with('studies', $studies);
    }

    public function editStudy(Request $request,$study_tranlastion_id){
        StudyTranslation::where('id',$study_tranlastion_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'heading' => $request->heading,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description

        ]);

        return redirect()->back();
    }

    public function addRedeemCode(Request $request) {
        Program::where('has_promotion', '=', 1)->update(['redeem_code' => $request->voucher_code]);
        return redirect()->to('/admin/programs')
            ->with('success_message','Successfully added redeem code!');
    }


    private function uploadFile($file,$path){
        $filename = $file->getClientOriginalName();
        $file->move(base_path().$path, $filename);
        return $filename;
    }
    public function showPrograms(Request $request) {
        $text_pages = $request->all()['text_pages'];
        $programs = Program::with('study')->with('translated')->get();
        return view('admin.programs',compact('text_pages', 'programs'));
    }
    
    public function showUpdateProgram(Request $request,$slug) {
        $text_pages = $request->all()['text_pages'];
        $program_id = ProgramTranslation::where('slug',$slug)->first()->program_id;
        $program_to_update = Program::find($program_id);
        return view('admin.update-program', compact('text_pages', 'program_to_update'));
    }

    public function showAddProgram(Request $request) {
        $studies = Study::all();
        return view('admin.add-program', compact('studies'));
    }

    public function editSingleProgram($program_id){
        $studies = Study::all();
        $program  = Program::find($program_id);
        return view('admin.programs.edit-single-program')
            ->with('studies',$studies)
            ->with('program',$program);
    }
    public function addProgram(Request $request) {
        
        $request->validate([
            'picture' => 'required|max:300',
            'cover' => 'required|max:300',
        ]);
        $input = $request->except(['text_pages']);

        //images
        $image = $request->file('picture');
        $cover = $request->file('cover');
        $pictureName = $image->getClientOriginalName();
        $coverName = $cover->getClientOriginalName();

        //only for the menu red label on top of text
        $is_new = $request->has('is_new') ? 1 : 0;
        $fast_track = $request->has('fast_track') ? 1 : 0;

        //insert program base
        $program_id = Program::insertGetId([
            "study_id" => $input['study_id'],
            'enrollment_fee' => $input['enrollment_fee'],
            'examination_fee' => $input['examination_fee'],
            'is_new' => $is_new,
            'fast_track' => $fast_track
        ]);

        //insert all translations of program)
        foreach(Config('languages') as $lang => $language){
            $program_same_slug = ProgramTranslation::where('locale', $lang)->where('slug', $input['slug_'.$lang])->exists();

            if ($program_same_slug == 1) {
                $prog_id_remove = Program::where('id', $program_id)->delete();
                return redirect()->to('/admin/programs')->with('error','The slug already exists!');
            }

            ProgramTranslation::insert([
                "name" => $input['name_'.$lang],
                "text" => $input['text_'.$lang],
                "slug" => $input['slug_'.$lang],
                "locale" => $lang,
                "meta_title" => $input['meta_title_'.$lang],
                "meta_description" => $input['meta_description_'.$lang],
                "single_page_heading" => $input['single_page_heading_'.$lang],
                "program_id" => $program_id
                
            ]);
        }

        //create entity  in database table images for the image component
        $destinationPath = public_path('/images/');
        $image->move($destinationPath, $pictureName);
        $cover->move($destinationPath, $coverName);
        $nickname = 'program-'.$program_id;
        $cover_nickname = 'program-cover-'.$program_id;
        $path = '/images/'.$pictureName;
        $this->createImage($nickname,$path);
        $this->createImage($cover_nickname,$path);
        return redirect()->route('program-video',$program_id)->with('success_message','Please select youtube video');
        
        
        return redirect()->back()->with('wrong_messaage','Please upload an image');
    }

    public function updateProgram(Request $request) {
       
        $input = $request->except(['text_pages']);
        foreach(Config('languages') as $lang => $language){
            $program_same_slug = ProgramTranslation::where('locale', $lang)
                ->where('slug', $input['slug_'.$lang])
                ->where('program_id' , '!=', $input['program_id'])
                ->exists();
            if ($program_same_slug == 1) {
                return redirect()->to('/admin/programs')->with('error','The slug already exists!');
            }
            $is_new = $request->has('is_new') ? 1 : 0;
            $fast_track = $request->has('fast_track') ? 1 : 0;

            Program::where('id', $input['program_id'])->update([
                'enrollment_fee' => $input['enrollment_fee'],
                'examination_fee' => $input['examination_fee'],
                'is_new' => $is_new,
                'fast_track' => $fast_track,
                'study_id' => $input['study_id']
            ]);

            ProgramTranslation::where('locale', $lang)->where('program_id',$input['program_id'])->update([
                'name' => $input['name_'.$lang],
                'text' => $input['text_'.$lang],
                'slug' => $input['slug_'.$lang],
                'program_id' => $input['program_id'],
                'locale' => $lang,
				"meta_title" => $input['meta_title_'.$lang],
                "meta_description" => $input['meta_description_'.$lang],
                "single_page_heading" => $input['single_page_heading_'.$lang],
            ]);
        }

        return redirect()->back()->with('success_message','Successfully updated program!');
    }

    
    ////# Create program steps

    #2 Step Video
    public function programVideo($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.video')
            ->with('program',$program)
            ->with('program_id',$program_id);
    }

    public function addProgramVideo(Request $request){
        $request->validate([
            'link' => 'required',
            'link_de' => 'required',
            "program_id" => 'required',

        ]);
        $video = $request->only('link','link_de','program_id');
        $program = ProgramVideo::updateOrCreate(['program_id' => $video['program_id']],$video);
        return redirect()->route('program-benefits',$program->program_id)
            ->with('success_message','Please add program benefits');
    }

    #3 Step Benefits
    public function programBenefits($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.benefits')
            ->with('program',$program)
            ->with('program_id',$program_id);
    }

    public function addProgramBenefits(Request $request){
       $request->validate([
        'program_id' => 'required',
       ]);
       $program_id = $request->program_id;
       $benefits = $request->benefits;
       $benefits_de = $request->benefits_de;
       $icons = $request->icons;
       ProgramBenefit::where('program_id',$program_id)->delete();
       for ($i=0; $i < count($benefits); $i++) { 
          ProgramBenefit::insert([
            'benefit' => $benefits[$i],
            'benefit_de' => $benefits_de[$i],
            'icon' => $icons[$i],
            'program_id' => $program_id,
          ]);
       }

       return redirect()->route('iso-certificate',$program_id);
    }

    #step 4 ISO certificates text only (the icons in different section)
    public function isoCertificate($program_id){
        $iso_icons = IsoIcon::all();
        $program = Program::find($program_id);
        return view('admin.programs.iso-certificate')
                ->with('iso_icons',$iso_icons)
                ->with('program',$program)
                ->with('program_id',$program_id);
    }

    public function isoCertificateText(Request $request){
        $request->validate([
            'iso_text' => 'required',
            'iso_text_de' => 'required',
            'program_id' => 'required'
        ]);
        $iso_text = $request->only('iso_text','iso_text_de','program_id');
        ProgramIsoText::updateOrCreate(['program_id' => $iso_text['program_id']],$iso_text);
        return redirect()->route('ai-support',$iso_text['program_id']);
    }

    #step 5 AI support 
    public function aiSupport($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.ai-support')
            ->with('program',$program)
            ->with('program_id',$program_id);
    }

    public function addAiSupportText(Request $request){
        $request->validate([
            'ai_support_text' => 'required',
            'ai_support_text_de' => 'required',
            'program_id' => 'required'
        ]);
        $ai_support_text = $request->only("ai_support_text","ai_support_text_de","program_id");
        AiSupport::updateOrCreate(['program_id' => $ai_support_text['program_id']],$ai_support_text);
        return redirect()->route('program-facts',$ai_support_text['program_id']);
    }

    #step 6 Program Facts
    public function programFacts($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.program-facts')
            ->with('program',$program)
            ->with('program_id',$program_id);
    }

    public function addProgramFacts(Request $request){
        $facts = $request->fact;
        $facts_de = $request->fact_de;
        $icons = $request->icon;
        $program_id = $request->program_id;
        ProgramFact::where('program_id',$program_id)->delete();
        for ($i=0; $i < count($facts); $i++) { 
            ProgramFact::insert([
              'fact' => $facts[$i],
              'fact_de' => $facts_de[$i],
              'program_id' => $program_id,
              'icon' => $icons[$i]
            ]);
         }
         return redirect()->route('study-program-content',$program_id);
    }

    #step 7 Program Content
    public function studyProgramContent($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.study-program-content')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addStudyProgramContent(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $study_program_content = $request->only('text','text_de','program_id');
        StudyProgramContent::updateOrCreate(['program_id' => $study_program_content['program_id']],$study_program_content);
        $accordions = $request->only('accordion_content','accordion_headline','bold_headline','accordion_content_de','accordion_headline_de','bold_headline_de');
        StudyProgramAccordion::where('program_id',$study_program_content['program_id'])->delete();
        for($i=0;$i < count($accordions['accordion_headline']);$i++){
            StudyProgramAccordion::insert([
                'program_id' => $study_program_content['program_id'],
                'headline' => $accordions['accordion_headline'][$i],
                'content' => $accordions['accordion_content'][$i],
                'bold_headline' => $accordions['bold_headline'][$i],
                'headline_de' => $accordions['accordion_headline_de'][$i],
                'content_de' => $accordions['accordion_content_de'][$i],
                'bold_headline_de' => $accordions['bold_headline_de'][$i]
            ]);
        }
        return redirect()->route('study-requirements',$study_program_content['program_id']);
    }   

    #step 8 StudyRequirements
    public function studyRequirements($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.study-requirements')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addStudyRequirements(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
       $study_requirements = ($request->only('text','text_de','program_id'));
       StudyRequirements::updateOrCreate(['program_id' => $study_requirements['program_id']],$study_requirements);
       return redirect()->route('required-documents',$study_requirements['program_id']);
    }

    #step 9 Required Documents
    public function requiredDocuments($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.required-documents')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addRequiredDocuments(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $required_documents = $request->only('text','text_de','program_id');
        RequiredDocuments::updateOrCreate(['program_id' => $required_documents['program_id']],$required_documents);
        return redirect()->route('tuition-fees',$required_documents['program_id']);
    }

    #step 10 Tuition Fees
    public function tuitionFees($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.tuition-fees')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addTuitionFees(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $fees = $request->only('text','text_de','program_id');
        TuitionFee::updateOrCreate(['program_id' => $fees['program_id']],$fees);
        return redirect()->route('financing',$fees['program_id']);
    }

     #step 11 Financing
    public function financing($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.financing')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addFinancing(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $financing = $request->only('text','text_de','program_id');
        Financing::updateOrCreate(['program_id' => $financing['program_id']],$financing);
        return redirect()->route('career-paths',$financing['program_id']);
    }

    #step 12 Career path
    public function careerPath($program_id){
        $program = Program::find($program_id);
        $job_categories = JobCategory::with('jobs')->get();
        return view('admin.programs.career-path')
        ->with('job_categories',$job_categories)
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addCareerPath(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $jobs = $request->job;
        $categories = $request->category;
        $career_path = $request->only('text','text_de','program_id');
        CareerPath::updateOrCreate(['program_id' => $career_path['program_id']],$career_path);
        //insert job category
        ProgramJobCategory::where('program_id',$career_path['program_id'])->delete();
        ProgramJob::where('program_id',$career_path['program_id'])->delete();
        foreach($categories as $category_id){
            ProgramJobCategory::insert([
                'category_id' => $category_id,
                'program_id' => $career_path['program_id']
            ]);
            foreach($jobs as $job_id){
                if(Job::find($job_id)->category_id == $category_id){
                    ProgramJob::insert([
                        'job_id' => $job_id,
                        'program_id' => $career_path['program_id'],
                        'category_id' => $category_id
                    ]);

                }
            }
        }
        
       
        return redirect()->route('partners',$career_path['program_id']);
    }
    #step 13 Partners
    public function partners($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.partners-text')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addPartner(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $partner_text = $request->only('text','text_de','program_id');
        PartnerText::updateOrCreate(['program_id' => $partner_text['program_id']],$partner_text);
        return redirect()->route('testimonials',$partner_text['program_id']);
    }

    #step 14 Testimonials
    public function testimonials($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.testimonials')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addTestimonial(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $testimonials = $request->only('text','text_de','program_id');
        if($request->hasFile('video')){
            $testimonials['video'] = $this->uploadFile($request->file('video'),'/public/videos');
        }
        ProgramTestimonial::updateOrCreate(['program_id' => $testimonials['program_id']],$testimonials);
        return redirect()->route('knowledge-for-success',$testimonials['program_id']);
    }

    public function knowledgeForSuccess($program_id){
        $program = Program::find($program_id);
        return view('admin.programs.knowledge-for-success')
        ->with('program',$program)
        ->with('program_id',$program_id);
    }
    public function addKnowledgeForSuccess(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'program_id' => 'required'
        ]);
        $knowledge_for_success = $request->only('text','text_de','program_id');
        KnowledgeForSuccess::updateOrCreate(['program_id' => $knowledge_for_success['program_id']],$knowledge_for_success);
        return redirect()->route('programs',$knowledge_for_success['program_id'])
            ->with('success_message','Program Created Successfully');
    }

    public function addIsoIcon(Request $request){
        $request->validate([
            'text' => 'required',
            'text_de' => 'required',
            'link' => 'required',
            'link_de' => 'required',
        ]);
        $icon = $request->only('text','text_de','link','link_de');
        $icon['icon'] =  $this->uploadFile($request->file('icon'),'/public/images/iso');
        IsoIcon::create($icon);
        return redirect()->back()->with('success_message','Icon added successfully');
    }

    public function deleteIsoIcon( $icon_id){
        IsoIcon::find($icon_id)->delete();
        return redirect()->back()->with('success_message','Icon deleted successfully');
    }
}
