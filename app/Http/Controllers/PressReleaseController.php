<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\PressRelease;
use App\PressReleaseTranslation;
use App\PressReleaseSection;
use App\DynamicNewsAuthor;
use App\PressReleaseSectionDetail;
use App\PressReleaseSectionTranslation;
use App\PressReleaseSectionDetailTranslation;
use App\PressReleaseCategory;
use App\PressReleaseImageAttribute;
use App\Image;

class PressReleaseController extends Controller
{

    public $path;

    public function __construct(){
        $this->path  = base_path()."/public/images/press_relese";
    }
    public function index(){
        $authors = DynamicNewsAuthor::all();
        $news = PressRelease::paginate(5);
        return view('admin.press-release.index')
            ->with('news', $news)
            ->with('authors', $authors);
    }

    public function store(Request $request){
        $request->validate([
            'slug' => 'required|unique:press_releases,slug',
        ]);
        $types = $request->type;
        $contents = $request->content;
        $data = $request->only('author_id','slug','key_facts','meta_title','meta_description','minutes','heading','teaser');

        $file = $request->file('pdf');
        $file_name = $file->getClientOriginalName();
        $file->move($this->path,$file_name);
        $data['pdf'] = $file->getClientOriginalName();
       
        $press_release = PressRelease::create($data);

        $picture = $request->file('picture');
        $picture_name = $file->getClientOriginalName();
        $picture->move($this->path,$picture_name);
        
        Image::create([
            'nickname' => 'press-release-'.$press_release->id,
            'src' => $this->path.'/'.$picture_name,
            'alt' => '',
            'title'=>''
        ]);
       
        foreach($contents as $key => $content){
            if($types[$key] == 1){
                $section_id = PressReleaseSection::insertGetId([
                    'news_id' => $press_release->id,
                    'type' => $types[$key],
                    'content' => $content,
                ]);
                
            }
            else if($types[$key] == 2){
                
                $file = $request->file('file_'.($key+1));
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('news_images'),$file_name);

                $section_id = PressReleaseSection::insertGetId([
                    'news_id' => $press_release->id,
                    'type' => $types[$key],
                    'content' => $file_name,
                ]);
        
            }
            else if($types[$key] == 3){

                $section_id =PressReleaseSection::insertGetId([
                    'news_id' => $press_release->id,
                    'type' => $types[$key],
                    'content' => $content,
                ]);
                
                
                foreach($details[$key+1] as $index => $content ){

                    $detail_id =PressReleaseSectionDetail::insertGetId([
                        'section_id' => $section_id,
                        'content' => $content,
                    ]);           
                }
            }
            else if($types[$key] == 4){
                $section_id = PressReleaseSection::insertGetId([
                    'news_id' => $press_release->id,
                    'content' => $content,
                    'type' => $types[$key]
                ]);
                
                
                foreach($details[$key+1] as $index => $content ){

                    $detail_id = PressReleaseSectionDetail::insertGetId([
                        'section_id' => $section_id,
                        'content' => $content,
                    ]);
                }
            }
       }

       return redirect()->back()->with('success_message'," Press release article created successfully");
    }

    public function show($news_id){
       $news = PressRelease::with('sections')->find($news_id);
       $authors = DynamicNewsAuthor::all();
       return view('admin.press-release.edit')
            ->with('authors', $authors)
            ->with('news', $news);
    }

     public function update(Request $request,$news_id){

        $press_release = $request->only('author_id','minutes','heading','teaser','key_facts','meta_title','meta_description');
        PressRelease::where('id',$news_id)->update($press_release);        
       
        return redirect()->back()->with('success_message','Facts hub article updated successfully');
    }   

    public function destroy($news_id){
        //News
        PressRelease::find($news_id)->delete();
        //Sections
        $sections = PressReleaseSection::where('news_id', $news_id)->get();
        foreach($sections as $section){
            //Section Detail
            $section_details = PressReleaseSectionDetail::where('section_id', $section->id)->get();
            foreach($section_details as $detail){
                PressReleaseSectionDetail::find($detail->id)->delete();
                PressReleaseSectionDetailTranslation::where('detail_id',$detail->id)->delete();
            }
           PressReleaseSectionTranslation::where('section_id', $section->id)->delete();
        }
        DynamicNewsSection::where('news_id', $news_id)->delete();


        return redirect()->back()->with('success_message','Facts hub article deleted successfully');;

        //Section Details
    }

    public function getImagesAttributes(){
        $images = DynamicNewsSection::with('all_translations')->where('type',2)->get(); //we take only the images section from Blog structure
        return view('admin.news-image-attributes')
            ->with('images',$images);
    }

    public function changeImageAttributes(Request $request,$image_id){

        if(DynamicNewsImageAttribute::where('image_id',$image_id)->count() == 0){
                DynamicNewsImageAttribute::insert([
                'alt_en' => $request->alt_en,
                'alt_de' => $request->alt_de,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
                'image_id' => $image_id
                ]);

        }
        else{
            DynamicNewsImageAttribute::where('image_id',$image_id)->update([
                'alt_en' => $request->alt_en,
                'alt_de' => $request->alt_de,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
            ]);
        }
       
        return redirect()->back();
    }
}

