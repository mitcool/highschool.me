@extends('admin_template')

@section('css')
<style>
    .section{
        margin-top:20px;
        padding:10px;
        border-top:2px solid rgb(77, 76, 74);
    }
    .selected-image{
        border:3px solid rgb(85, 146, 215) !important;
    }
</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Edit News</h2>
    <form action="{{ route('dynamic-news-update',$news->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row mt-2">
            <div class="col-md-12">
                <img src="{{ asset('images/news') }}/{{ $news->image }}" alt="" class="w-100">
                <input type="file" name="image" class="mt-3">
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0 mt-3">News Author:</label>
                <select name="author_id" id=""  required class="form-control">
                    <option value="" disabled selected>Please select an author</option>
                    @foreach ($authors as $author) 
                        <option {{ $author->id == $news->author->id ? ' selected ' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0 mt-3">Min to read</label>
                <input type="number" name="minutes" value="{{ $news->minutes }}" class="form-control" required />
            </div>
            
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0 mt-3">Slug</label>
                <input type="text" name="slug" value="{{ $news->slug }}" class="form-control" required />
            </div>
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0 mt-3">Key Facts</label>
                <textarea  name="key_facts" class="form-control ckeditor">{{ $news->key_facts }}</textarea>
            </div>
            
			<div class="col-md-12">
                <label for="" class="font-weight-bold mb-0 mt-3">Meta title</label>
				<textarea  name="meta_title"  class="form-control" required >{{ $news->meta_title }}</textarea>
            </div>
           
			<div class="col-md-12">
                <label for="" class="font-weight-bold mb-0 mt-3">Meta description </label>
                <textarea  name="meta_description" class="form-control" required >{{ $news->meta_description }}</textarea>
            </div>
           
            @foreach($news->sections as $key => $section)
            <div class="col-md-12">
                @if($key == 0)
                    <label for="" class="font-weight-bold mb-0 mt-3">Heading(h1) </label>
                    <textarea  name="content[{{ $section->id }}]" class="form-control" required >{{ $section->content }}</textarea>
                @elseif($key == 1)
                    <label for="" class="font-weight-bold mb-0 mt-3 d-block">Teaser</label>
                    <textarea  name="content[{{ $section->id }}]" class="ckeditor" required >{{ $section->content }}</textarea>
                @else 
                    @if($section->type == 1)
                        <label for="" class="font-weight-bold mb-0 mt-3">Content</label>
                        <textarea  name="content[{{ $section->id }}]" class="ckeditor" required >{{ $section->content}}</textarea>
                    @elseif($section->type==2)
                        <label for="" class="font-weight-bold mb-0 mt-3">Image</label>
                        <img src="{{ asset('images/news') }}/{{ $section->content }}" alt="" class="w-100">
                        <input type="file" name="content[{{ $section->id }}]" class="mt-3">
                    @endif
                @endif
            </div>
            @endforeach
       
        <div class="d-flex justify-content-center my-2 w-100">
            <button class="btn btn-warning" >Save Changes</button>
        </div>
    </form>
</div>
  
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection