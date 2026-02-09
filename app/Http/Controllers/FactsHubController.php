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
    public string $path = 'images/fact-hub';

    public function index(){
        $authors = DynamicNewsAuthor::all();
        $news = FactHub::paginate(5);
        return view('admin.facts-hub.index')
            ->with('news', $news)
            ->with('authors', $authors);
    }

    public function store(Request $request){
      $request->validate([
            'author_id' => 'required',
            'slug' => 'required|unique:fact_hubs,slug',
            'key_facts' => 'required',
            'minutes' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image' => 'required'
       ]);
       $news =  $request->only('author_id','slug','key_facts','minutes','meta_title','meta_description');
       $news['image'] = $this->upload_file($request->file('image'),$this->path);
       $contents = $request->content;
       $types = $request->type;
       $created_news = FactHub::create($news);
       
       foreach($contents as $key => $content){
           if($types[$key] == 1){
                FactHubSection::insert([
                    'content' => $content,
                    'type' => $types[$key],
                    'news_id' => $created_news->id
                ]);
           }
           else if($types[$key] == 2){
                $file_name = $this->upload_file($request->file('file_'.($key+1)),$this->path);
                FactHubSection::insert([
                    'content' => $file_name,
                    'type' => $types[$key],
                    'news_id' => $created_news->id
                ]);
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
        $news_input = $request->only('author_id','minutes','slug','key_facts','meta_title','meta_description');
        $news = DynamicNews::find($news_id);
        $contents = $request->content;
        foreach($contents as $id => $content){
            $section = DynamicNewsSection::find($id);
            if($section->type == 1){
                $section->update(['content'=>$content]);
            }
            elseif($section->type == 2){ 
                $filename = $this->upload_file($content,$this->path);
                $section->update(['content'=>$filename]);
            }
        }
      
        if($request->hasFile('image')){
            $news_input['image'] = $this->upload_file($request->file('image'),$this->path);    
        }
        $news->update($news_input);
           

        return redirect()->back()->with('success_message','Article updated successfully');
    }   

    public function destroy($news_id){
        //News
        DynamicNews::find($news_id)->delete();
        DynamicNewsSection::where('news_id', $news_id)->delete();
        return redirect()->route('dynamic-news')->with('success_message','Article deleted successfully');;
    }
}

