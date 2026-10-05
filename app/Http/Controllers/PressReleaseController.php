<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\PressRelease;
use App\PressReleaseCitation;
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
        $this->path  = '/images/press_release';
        $this->pdf_path = '/images/press_release/pdf';
    }
    public function index(){
        $authors = DynamicNewsAuthor::all();
        $news = PressRelease::paginate(10);
        return view('admin.press-release.index')
            ->with('news', $news)
            ->with('authors', $authors);
    }

    public function store(Request $request){
        $request->validate([
            'slug' => 'required|unique:press_releases,slug',
            'key_facts' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'author_id' => 'required',
            'minutes' => 'required',
            'heading'=> 'required',
            'teaser' => 'required',
            'media_name' => 'required',
            'pdf_file' => 'required'
        ]);
        $types = $request->type;
        $contents = $request->content;
        $data = $request->only('author_id','slug','key_facts','meta_title','meta_description','minutes','heading','teaser');
        $pdf_files = $request->file('pdf_file');
        $media_name = $request->media_name;
        $citation_date = $request->citation_date;
        $press_release = PressRelease::create($data);

        $picture = $request->file('picture');
        $picture_name = $picture->getClientOriginalName();
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
                    'position' => $key,
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
                    'position' => $key,
                    'content' => $file_name,
                ]);

            }
            else if($types[$key] == 5){
                $section_id = PressReleaseSection::insertGetId([
                    'news_id' => $press_release->id,
                    'type' => $types[$key],
                    'position' => $key,
                    'content' => trim($content),
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

        foreach($pdf_files as $key => $pdf_file){
             
             $pdf_file_name = $pdf_file->getClientOriginalName();
             $pdf_file->move($this->pdf_path,$pdf_file_name);

             PressReleaseCitation::insert([
                 'news_id' => $press_release->id,
                 'media_name' => $media_name[$key],
                 'date' => $citation_date[$key],
                 'pdf_file' => $pdf_file_name
             ]);
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

        $contents = $request->content ?? [];
        foreach($contents as $id => $content){
            $section = PressReleaseSection::where('news_id', $news_id)->find($id);
            if(!$section){
                continue;
            }
            if($section->type == 1){
                PressReleaseSection::where('id', $id)->update(['content'=>$content]);
            }
            elseif($section->type == 2){
                if(!$content instanceof \Illuminate\Http\UploadedFile){
                    continue;
                }
                $filename = $this->upload_file($content,public_path('news_images'));
                PressReleaseSection::where('id', $id)->update(['content'=>$filename]);
            }
            elseif($section->type == 5){
                PressReleaseSection::where('id', $id)->update(['content'=>trim($content)]);
            }
        }

        // Sections added on the edit page, keyed by a client-side reference used in order[]
        $new_ids = [];
        foreach($request->input('new_sections', []) as $ref => $new_section){
            $type = (int) ($new_section['type'] ?? 0);
            $content = null;
            if($type == 1){
                $content = $new_section['content'] ?? '';
            }
            elseif($type == 2 && $request->hasFile("new_sections.$ref.file")){
                $content = $this->upload_file($request->file("new_sections.$ref.file"),public_path('news_images'));
            }
            elseif($type == 5 && !empty($new_section['content'])){
                $content = trim($new_section['content']);
            }
            if($content === null){
                continue;
            }
            $new_ids[$ref] = PressReleaseSection::insertGetId([
                'content' => $content,
                'type' => $type,
                'news_id' => $news_id
            ]);
        }

        // order[] lists all content sections in their new order (heading and teaser are not sections here)
        foreach($request->input('order', []) as $index => $ref){
            $id = strpos($ref, 'new_') === 0 ? ($new_ids[substr($ref, 4)] ?? null) : (int) $ref;
            if($id){
                PressReleaseSection::where('news_id', $news_id)->where('id', $id)->update(['position' => $index]);
            }
        }

        return redirect()->back()->with('success_message','Facts hub article updated successfully');
    }   

    public function destroy($news_id){
        $press_release = PressRelease::findOrFail($news_id);
        //Sections
        PressReleaseSection::where('news_id', $news_id)->delete();
        //Citations
        PressReleaseCitation::where('news_id', $news_id)->delete();
        //Press release
        $press_release->delete();

        return redirect()->back()->with('success_message','Press release deleted successfully');
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

