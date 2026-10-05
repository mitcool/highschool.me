
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
    <h2 class="text-center page-headings">Edit News</h2>
    <form action="{{ route('dynamic-news-update',$news->id) }}" method="POST" enctype="multipart/form-data" class="confirm-first" id="update">
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
           
            @foreach($news->sections->take(2) as $key => $section)
            <div class="col-md-12">
                @if($key == 0)
                    <label for="" class="font-weight-bold mb-0 mt-3">Heading(h1) </label>
                    <textarea  name="content[{{ $section->id }}]" class="form-control" required >{{ $section->content }}</textarea>
                @else
                    <label for="" class="font-weight-bold mb-0 mt-3 d-block">Teaser</label>
                    <textarea  name="content[{{ $section->id }}]" id="section-{{ $section->id }}" class="ckeditor" required >{{ $section->content }}</textarea>
                @endif
            </div>
            @endforeach
        </div>

        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Sections</h4>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="toggle_reorder">Reorder sections</button>
        </div>

        <div id="sections_list">
            @foreach($news->sections->slice(2) as $section)
                @if(in_array($section->type, [1, 2, 5]))
                <div class="section sortable-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-grip-vertical drag-handle mr-2"></i>
                            @if($section->type == 1) Text section
                            @elseif($section->type == 2) Image section
                            @else Video section
                            @endif
                        </h5>
                    </div>
                    <div class="section-preview"></div>
                    <div class="section-body">
                    @if($section->type == 1)
                        <textarea  name="content[{{ $section->id }}]" id="section-{{ $section->id }}" class="ckeditor" required >{{ $section->content}}</textarea>
                    @elseif($section->type == 2)
                        <img src="{{ asset('images/news') }}/{{ $section->content }}" alt="" class="w-100">
                        <input type="file" name="content[{{ $section->id }}]" class="mt-3">
                    @else
                        <label for="" class="font-weight-bold mb-0 mt-2">Video URL</label>
                        <input type="url" name="content[{{ $section->id }}]" value="{{ $section->content }}" class="form-control" required />
                    @endif
                    </div>
                    <input type="hidden" name="order[]" value="{{ $section->id }}">
                </div>
                @endif
            @endforeach
        </div>

        <hr>
        <div class="text-center">
            <button class="btn btn-info" data-toggle="modal" data-target="#type_modal" type="button">+ Add new section</button>
        </div>

        <div class="d-flex justify-content-center my-2 w-100">
            <button class="btn btn-warning" >Save Changes</button>
        </div>
    </form>
</div>

<div class="modal fade bd-example-modal-lg" id="type_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="row m-0">
            <div class="col-md-4 p-2">
                <img src="{{ asset('images/admin/text.png') }}" class="w-100 border options" data-value="1"/>
                <p class="font-weight-bold text-center">Text</p>
            </div>
            <div class="col-md-4 p-2">
                <img src="{{ asset('images/admin/image.jpg') }}" class="w-100 border options" data-value="2" />
                <p class="font-weight-bold text-center">Image</p>
            </div>
            <div class="col-md-4 p-2">
                <div class="w-100 h-75 border options d-flex align-items-center justify-content-center bg-light" data-value="5" style="min-height:120px;cursor:pointer;">
                    <i class="fas fa-video" style="font-size:60px;color:rgb(77, 76, 74);"></i>
                </div>
                <p class="font-weight-bold text-center">Video</p>
            </div>
            <div class="col-md-12 p-2 text-center">
                <hr>
                <button class="btn btn-info" type="button" id="add_section">Add section</button>
            </div>
            <input type="hidden" id="type" value="">
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('admin.partials.section-sorting')
@endsection
