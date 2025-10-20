<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqCategory;
use App\FaqCategoryTranslation;

class FooterController extends Controller
{
  public function showFaq(Request $request){
    $faqcategories  = FaqCategory::all();
    return view('pages.footer.faq',compact('faqcategories'));
  }

  public function getSingleFaqCategory(Request $request,$slug){
    $faq_translation = FaqCategoryTranslation::where('slug',$slug)->first() ?? abort(404);
    $faq_category_questions = FaqCategory::find($faq_translation->category_id);
   
    return view('pages.footer.single_faq',compact('faq_category_questions'));
  }
    public function codeOfEthics(){
        
    }
    
    public function terms(){

    }

    public function welcomeToSchool(){

    }

    public function starterKit(){
        return view('pages.footer.starter-kit');
    }

     public function accessibility(){
      return view('pages.footer.accessibility');
  }
}
