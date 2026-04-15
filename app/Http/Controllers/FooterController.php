<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqCategory;
use App\FaqCategoryTranslation;

class FooterController extends Controller
{
  public function showFaq(Request $request){
    $texts = $request->all()['texts'];
    $faqcategories  = FaqCategory::all();
    return view('pages.footer.faq',compact('faqcategories','texts'));
  }

  public function getSingleFaqCategory(Request $request,$slug){
    $texts = $request->all()['texts'];
    $faq_translation = FaqCategoryTranslation::where('slug',$slug)->first() ?? abort(404);
    $faq_category_questions = FaqCategory::find($faq_translation->category_id);
    return view('pages.footer.single_faq',compact('faq_category_questions','texts'));
  }
  public function terms(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.footer.terms_and_conditions')
        ->with('texts',$texts);
  }
  public function starterKit(Request $request){
    $texts = $request->all()['texts'];
      return view('pages.footer.starter-kit')
      ->with('texts',$texts);
  }
  public function accessibility(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.footer.accessibility')
      ->with('texts',$texts);
  }
  public function showCodeOfEtics(Request $request){
    $texts = $request->all()['texts'];
    return view('pages.footer.code-of-ethics')
      ->with('texts',$texts);     
  }
}
