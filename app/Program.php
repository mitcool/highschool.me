<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\Image;


class Program extends Model
{
    protected $table = 'programs';
    
    public $timestamps = false;

    public function all_translations(){
        return $this->hasMany('App\ProgramTranslation','program_id','id');
    }

    public function translated(){
        return $this->hasOne('App\ProgramTranslation','program_id','id')->where('locale',app()->currentLocale());
    }

    public function study(){
        return $this->hasOne('App\Study','id','study_id');
    }

	 public function image(){
        return Image::where('nickname','program-'.$this->id)->first()->src;
    }

    public function studySlug() {
        return $this->hasOne('App\StudyTranslation', 'study_id', 'study_id')->where('locale',app()->currentLocale());
    }

    // Program sections 
    #2 Video
    public function main_video(){
        return $this->hasOne('App\ProgramVideo','program_id','id');
    }

    #3 Benefits
    public function benefits(){
        return $this->hasMany('App\ProgramBenefit','program_id','id');
    }

    #4 ISO text
    public function iso(){
        return $this->hasOne('App\ProgramIsoText','program_id','id');
    }

    #5 AI Support
    public function ai_support(){
        return $this->hasOne('App\AiSupport','program_id','id');
    }

     #6 Facts
     public function facts(){
        return $this->hasMany('App\ProgramFact','program_id','id');
    }

    #7 Program Content
    public function program_content(){
        return $this->hasOne('App\StudyProgramContent','program_id','id');
    }

    public function program_content_accordion(){
        return $this->hasMany('App\StudyProgramAccordion','program_id','id');
    }
    #8 Requirements
    public function study_requirements(){
        return $this->hasOne('App\StudyRequirements','program_id','id');
    }
    #9 Documents
    public function required_documents(){
        return $this->hasOne('App\RequiredDocuments','program_id','id');
    }
    #10 Tuition Fees
    public function tuition_fee(){
        return $this->hasOne('App\TuitionFee','program_id','id');
    }
     #11 Financings
     public function financing(){
        return $this->hasOne('App\Financing','program_id','id');
    }
    public function financing_accordion(){
        return $this->hasMany('App\FinancingAccordion','program_id','id');
    }
    #12 Career Path
    public function career_paths(){
        return $this->hasOne('App\CareerPath','program_id','id');
    }

    #13 Partners
    public function partner_text(){
        return $this->hasOne('App\PartnerText','program_id','id');
    }

    #14 Testimnial
    public function testimonials(){
        return $this->hasOne('App\ProgramTestimonial','program_id','id');
    }

    #15 Knowledge For Success
    public function knowledge_for_success(){
        return $this->hasOne('App\KnowledgeForSuccess','program_id','id');
    }
}
