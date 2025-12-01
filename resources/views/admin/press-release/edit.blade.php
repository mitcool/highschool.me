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
<div class="jumbotron container">
    @if(!Cookie::has('watched'))
        <h2>Please watch the tutorial before you start!</h2>
    @endif
    <h2>Edit News a news</h2>
    <form action="{{ route('press-release-update',$news->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row mt-2">
            <div class="col-md-6"><label for="" class="font-weight-bold">News Author:</label>
                <select name="author_id" id=""  required class="form-control">
                    <option value="" disabled selected>Please select an author</option>
                    @foreach ($authors as $author) 
                        <option {{ $author->id == $news->author->id ? ' selected ' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Min to read</label>
                <input type="number" name="minutes" value="{{ $news->minutes }}" class="form-control" required />
            </div>

       
            @foreach($news->all_translations as $translation)
                <div class="col-md-12">
                    <label for="" class="font-weight-bold mb-0">Slug({{ $translation->locale }})</label>
                    <input type="text" name="slug_{{ $translation->locale }}" class="form-control" required value="{{ $translation->slug }}"/>
                </div>
            @endforeach

            @foreach($news->all_translations as $translation)
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Meta title({{ $translation->locale }})</label>
                <input type="text" name="meta_title_{{ $translation->locale }}" value="{!! $translation->meta_title !!}" class="form-control" required />
            </div>
            @endforeach

            @foreach($news->all_translations as $translation)
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Meta description({{ $translation->locale }})</label>
                <input type="text" name="meta_description_{{ $translation->locale }}" value="{!! $translation->meta_description !!}" class="form-control" required />
            </div>
            @endforeach

            @foreach($news->all_translations as $translation)
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Key facts({{ $translation->locale }})</label>
                <textarea required class="form-control ckeditor" name="key_facts_{{ $translation->locale }}">{!! $translation->key_facts !!}</textarea>
            </div>
            @endforeach
        </div>

        <hr>
        <label for="" class="font-weight-bold mb-0 d-block">Content:</label>
        @foreach ($news->sections as $key => $section)
            @if($section->type == 1)
                <div class="section row">
                    <div class="col-md-12">
                        <h4>Text section:</h4>
                    </div>
                    @foreach ($section->all_translations as $section_translation)
                        <div class="col-md-12">
                            <label class="m-0 font-weight-bold">Content({{ $section_translation->locale }})</label>
                            <textarea required class="{{$key == 0 ? 'form-control' : 'ckeditor'}}" id="text-en-${section}" name="section_translations[{{ $section_translation->id }}]">{{ $section_translation->content }}</textarea>
                        </div>
                    @endforeach
                    <input type="hidden" name="type[]" value="1" />
                </div>

                
            @elseif($section->type==2)
                <div class="section d-block">
                    <h4>Picture section:</h4>
                  
                    <div class="w-100 d-flex justify-content-center align-items-center  flex-column">
                        <img src="{{ asset('news_images') }}/{{ $section->all_translations[0]->content }}" alt="" class="w-50 d-block mb-2">
                        <input type="file" name="files[{{ $section->id }}]">
                    </div>
                </div>
            @elseif($section->type==3)
            <div class="section row">
                <div class="col-md-12">
                    
                    <h4>Blockquote section:</h4>
                </div>
                @foreach($section->all_translations as $bqst)
                <div class="col-md-12">
                    <label class="m-0 font-weight-bold">Quote({{ $bqst->locale }})</label>
                    <textarea required class="form-control" name="section_translations[{{ $bqst->id }}]">{{ $bqst->content }}</textarea>
                </div>
                @endforeach

                @foreach($section->details as $detail)
                    @foreach ($detail->all_translations as $translation)
                        <div class="col-md-12">
                            <label class="m-0 font-weight-bold">Quote Author({{ $translation->locale }})</label>
                            <input required type="text" class="form-control my-1" value="{{ $translation->content}}"  name="details[{{$translation->id}}]"/>
                        </div>
                    @endforeach
                @endforeach
                <input type="hidden" name="type[]" value="3" />
            </div>
            @elseif($section->type==4)
            <div class="section row">
                <div class="col-md-12">
                    <h4>Table section:</h4>
                </div>

                @foreach ($section->all_translations as $st)
                    <div class="col-md-12">
                        <label class="font-weight-bold mb-0">Heading({{ $st->locale }})</label>
                        <textarea class="form-control" required name="section_translations[{{ $st->id }}]">{{ $st->content }}</textarea>
                    </div>
                @endforeach

                @foreach($section->details as $detail)
                    @foreach ($detail->all_translations as $translation)
                        <div class="col-md-12">
                            <label class="font-weight-bold mb-0">Box 1({{ $translation->locale }})</label>
                            <textarea required class="form-control" name="details[{{ $translation->id }}]">{{ $translation->content }}</textarea>
                        </div>
                    @endforeach
                @endforeach
                

                <input type="hidden" name="type[]" value="4">
            </div>
            @endif
          
           
        @endforeach
       
        <div class="d-flex justify-content-center my-2">
            <button class="btn btn-warning" >Save Changes</button>
        </div>
    </form>
</div>
  
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection