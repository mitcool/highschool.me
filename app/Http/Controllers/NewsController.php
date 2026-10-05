<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

use App\DynamicNews;
use App\DynamicNewsSection;
use App\DynamicNewsAuthor;
use App\DynamicNewsSectionDetail;
use App\DynamicNewsImageAttribute;

class NewsController extends Controller
{
    public $path;

    public function __construct(){
        $this->path  = base_path()."/public/images/news";
    }
    public function index(){
        $authors = DynamicNewsAuthor::all();
        $news = DynamicNews::paginate(5);
        return view('admin.news-explorer.index')
            ->with('news', $news)
            ->with('authors', $authors);
    }

    public function store(Request $request){
       $request->validate([
            'author_id' => 'required',
            'slug' => 'required|unique:dynamic_news,slug',
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
       $created_news = DynamicNews::create($news);
       
       foreach($contents as $key => $content){
           if($types[$key] == 1){
                DynamicNewsSection::insert([
                    'content' => $content,
                    'type' => $types[$key],
                    'position' => $key,
                    'news_id' => $created_news->id
                ]);
           }
           else if($types[$key] == 2){
                $file_name = $this->upload_file($request->file('file_'.($key+1)),$this->path);
                DynamicNewsSection::insert([
                    'content' => $file_name,
                    'type' => $types[$key],
                    'position' => $key,
                    'news_id' => $created_news->id
                ]);
            }
           else if($types[$key] == 5){
                DynamicNewsSection::insert([
                    'content' => trim($content),
                    'type' => $types[$key],
                    'position' => $key,
                    'news_id' => $created_news->id
                ]);
           }
           
       }

       return redirect()->back();
    }

    public function show($news_id){
       $news = DynamicNews::with('sections')->find($news_id);
       $authors = DynamicNewsAuthor::all();
       return view('admin.news-explorer.edit-news')
            ->with('authors', $authors)
            ->with('news', $news);
    }

     public function update(Request $request,$news_id){
        $news_input = $request->only('author_id','minutes','slug','key_facts','meta_title','meta_description');
        $news = DynamicNews::find($news_id);

        $contents = $request->content ?? [];
        foreach($contents as $id => $content){
            $section = DynamicNewsSection::where('news_id', $news_id)->find($id);
            if(!$section){
                continue;
            }
            if($section->type == 1){
                $section->update(['content'=>$content]);
            }
            elseif($section->type == 2){
                if(!$content instanceof \Illuminate\Http\UploadedFile){
                    continue;
                }
                $filename = $this->upload_file($content,$this->path);
                $section->update(['content'=>$filename]);
            }
            elseif($section->type == 5){
                $section->update(['content'=>trim($content)]);
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
                $content = $this->upload_file($request->file("new_sections.$ref.file"),$this->path);
            }
            elseif($type == 5 && !empty($new_section['content'])){
                $content = trim($new_section['content']);
            }
            if($content === null){
                continue;
            }
            $new_ids[$ref] = DynamicNewsSection::insertGetId([
                'content' => $content,
                'type' => $type,
                'news_id' => $news_id
            ]);
        }

        // order[] lists the sections below the headline and teaser in their new order
        foreach($request->input('order', []) as $index => $ref){
            $id = strpos($ref, 'new_') === 0 ? ($new_ids[substr($ref, 4)] ?? null) : (int) $ref;
            if($id){
                DynamicNewsSection::where('news_id', $news_id)->where('id', $id)->update(['position' => $index + 2]);
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
