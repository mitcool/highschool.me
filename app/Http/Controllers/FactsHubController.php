<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\FactHub;
use App\FactHubTranslation;
use App\FactHubSection;
use App\DynamicNewsAuthor;
use App\FactHubSectionDetail;
use App\FactHubSectionTranslation;
use App\FactHubSectionDetailTranslation;
use App\FactHubCategory;
use App\FactHubImageAttribute;

class FactsHubController extends Controller
{
    public function index(){
        $authors = DynamicNewsAuthor::all();
        $news = FactHub::paginate(5);
        return view('admin.facts-hub.index')
            ->with('news', $news)
            ->with('authors', $authors);
    }

    public function store(Request $request){
       $types = $request->type;
       $contents = $request->content;
       $contents_de = $request->content_de;
       $details = $request->details;
       $details_de = $request->details_de;
       $slug = $request->slug;
       $slug_de = $request->slug_de;


       if(FactHubTranslation::where('slug',$slug)->count() > 0){
          return redirect()->back()->with('error','The English slug you selected has already exists');
       }
       if(FactHubTranslation::where('slug',$slug_de)->count() > 0){
            return redirect()->back()->with('error','The German slug you selected has already exists');
       }

       $request->validate([
        'slug' => 'required|unique:dynamic_news_translations,slug',
        'slug_de' => 'required|unique:dynamic_news_translations,slug,'
    ]);

       $news_id = FactHub::insertGetId([
            'author_id' => $request->author_id,
            'category_id' => 0,
            'minutes' => $request->minutes
        ]);

        FactHubTranslation::insert([
            'locale' => 'en',
            'slug' => $slug,
            'news_id' => $news_id,
            'meta_title' => $request->meta_title_en,
            'key_facts' => $request->key_facts_en,
            'meta_description' => $request->meta_description_en
        ]);

       FactHubTranslation::insert([
            'locale' => 'de',
            'slug' => $slug_de,
            'news_id' => $news_id,
            'key_facts' => $request->key_facts_de,
            'meta_title' => $request->meta_title_de,
            'meta_description' => $request->meta_description_de
            
        ]);

       foreach($contents as $key => $content){
            if($types[$key] == 1){
                $section_id = FactHubSection::insertGetId([
                    'news_id' => $news_id,
                    'type' => $types[$key]
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $content,
                    'locale' => 'en',
                    'section_id'=> $section_id,
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $contents_de[$key],
                    'locale' => 'de',
                    'section_id'=> $section_id,
                ]);
            }
            else if($types[$key] == 2){
                
                $file = $request->file('file_'.($key+1));
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('news_images'),$file_name);

                $section_id = FactHubSection::insertGetId([
                    'news_id' => $news_id,
                    'type' => $types[$key]
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $file_name,
                    'locale' => 'en',
                    'section_id'=> $section_id,
                ]);
            }
            else if($types[$key] == 3){

                $section_id = FactHubSection::insertGetId([
                    'news_id' => $news_id,
                    'type' => $types[$key]
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $content,
                    'locale' => 'en',
                    'section_id'=> $section_id,
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $contents_de[$key],
                    'locale' => 'de',
                    'section_id'=> $section_id,
                ]);
                foreach($details[$key+1] as $index => $content ){

                    $detail_id =FactHubSectionDetail::insertGetId([
                        'section_id' => $section_id,
                    ]);
                   FactHubSectionDetailTranslation::insert([
                        'content' => $content,
                        'locale' => 'en',
                        'detail_id'=> $detail_id,
                    ]);
                   FactHubSectionDetailTranslation::insert([
                        'content' => $details_de[$key+1][$index],
                        'locale' => 'de',
                        'detail_id'=> $detail_id,
                    ]);
                }
            }
            else if($types[$key] == 4){
                $section_id = FactHubSection::insertGetId([
                    'news_id' => $news_id,
                    'type' => $types[$key]
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $content,
                    'locale' => 'en',
                    'section_id'=> $section_id,
                ]);
                FactHubSectionTranslation::insert([
                    'content' => $contents_de[$key],
                    'locale' => 'de',
                    'section_id'=> $section_id,
                ]);
                foreach($details[$key+1] as $index => $content ){

                    $detail_id = FactHubSectionDetail::insertGetId([
                        'section_id' => $section_id,
                    ]);
                    FactHubSectionDetailTranslation::insert([
                        'content' => $content,
                        'locale' => 'en',
                        'detail_id'=> $detail_id,
                    ]);
                    FactHubSectionDetailTranslation::insert([
                        'content' => $details_de[$key+1][$index],
                        'locale' => 'de',
                        'detail_id'=> $detail_id,
                    ]);
                }
             
            }
       }

       return redirect()->back()->with('success_message'," Facts Hub article created successfully");
    }

    public function show($news_id){
       $news = FactHub::with('sections')->find($news_id);
       $authors = DynamicNewsAuthor::all();
       return view('admin.facts-hub.edit')
            ->with('authors', $authors)
            ->with('news', $news);
    }

     public function update(Request $request,$news_id){
        $input = $request->all();
        $section_translations = $input['section_translations'];
        $details = $request->details;
    
        FactHub::where('id',$news_id)->update([
            'author_id' => $request->author_id,
            'category_id' => 0,
            'minutes' => $request->minutes
        ]);

        foreach(Config::get('languages') as $lang => $language){
            FactHubTranslation::where('news_id',$news_id)->where('locale',$lang)->update([
                'slug' => $input['slug_'.$lang],
                'key_facts' => $input['key_facts_'.$lang],
            ]);
        }

        foreach(Config::get('languages') as $lang => $language){
            FactHubTranslation::where('news_id',$news_id)->where('locale',$lang)->update([
                'meta_title' => $input['meta_title_'.$lang], 'meta_description' => $input['meta_description_'.$lang]
            ]);
        }

        foreach($section_translations as $id => $content){
            FactHubSectionTranslation::where('id',$id)->update([
                'content' => $content
            ]);
        }
        if($details){
            foreach($details as $id => $content){
                FactHubSectionDetailTranslation::where('id',$id)->update([
                    'content' => $content
                ]);
            }
        }
        if($request->hasFile('files')){
            foreach($request->file('files') as $id => $file){

                $file_name = $file->getClientOriginalName();
                $file->move(public_path('news_images'),$file_name);
                $old_image = FactHubSectionTranslation::where('section_id',$id)->first()->content;
    
                FactHubSectionTranslation::where('section_id',$id)->update([
                    'content' => $file_name,
                ]);
    
                $old_path = base_path().'/public/news_images/'.$old_image;
    
                try{
                    unlink($old_path);
                }catch(\Exception $e){
                    info($e->getMessage());
                }
            }
        }
       
       
        return redirect()->back()->with('success_message','Facts hub article updated successfully');
    }   

    public function destroy($news_id){
        //News
        FactHub::find($news_id)->delete();
        //Sections
        $sections = FactHubSection::where('news_id', $news_id)->get();
        foreach($sections as $section){
            //Section Detail
            $section_details =  FactHubSectionDetail::where('section_id', $section->id)->get();
            foreach($section_details as $detail){
                FactHubSectionDetail::find($detail->id)->delete();
                FactHubSectionDetailTranslation::where('detail_id',$detail->id)->delete();
            }
            FactHubSectionTranslation::where('section_id', $section->id)->delete();
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

