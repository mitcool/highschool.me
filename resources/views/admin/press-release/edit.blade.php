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
    label{
        margin-top:15px;
        margin-bottom:3px;
    }
</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">
    <h2 class="text-center">Edit press release article</h2>
    <hr>
    <form action="{{ route('press-release-update',$news->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="" class="font-weight-bold">News Author:</label>
                <select name="author_id" id=""  required class="form-control">
                    <option value="" disabled selected>Please select an author</option>
                    @foreach ($authors as $author) 
                        <option {{ $author->id == $news->author->id ? ' selected ' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="col-md-6">
                <label for="" class="font-weight-bold ">Min to read</label>
                <input type="number" name="minutes" value="{{ $news->minutes }}" class="form-control" required />
            </div>

            <div class="col-md-12">
                <label for="" class="font-weight-bold ">Heading</label>
                <textarea class="form-control" name="heading">{{ $news->heading }}</textarea>
            </div>

            <div class="col-md-12">
                <label for="" class="font-weight-bold ">Teaser</label>
                <textarea class="ckeditor" id="teaser" name="teaser">{{ $news->teaser }}</textarea>
            </div>

            <div class="col-md-12">
                <label for="" class="font-weight-bold ">Key Facts</label>
                <textarea class="ckeditor" name="key_facts" id="key_facts">{{ $news->key_facts }}</textarea>
            </div>
            <div class="col-md-12">
                <label for="" class="font-weight-bold ">PDF</label>
                <input type="file" name="pdf">
            </div>

            <div class="col-md-12">
                <label for="" class="font-weight-bold ">Meta title</label>
                <textarea class="form-control" name="meta_title">{{ $news->meta_title }}</textarea>
            </div>

            <div class="col-md-12">
                <label for="" class="font-weight-bold ">Meta description</label>
                <textarea class="form-control" name="meta_description">{{ $news->meta_description }}</textarea>
            </div>
        </div>

        <hr>
        <label for="" class="font-weight-bold mb-0 d-block">Content:</label>
        @foreach ($news->sections as $key => $section)
            @if($section->type == 1)
                <div class="section row">
                    <div class="col-md-12">
                        <h4>Text section:</h4>
                    </div>
                   
                    <div class="col-md-12">
                        <label class="m-0 font-weight-bold">Content</label>
                        <textarea required class="ckeditor" id="text-en-${section}" name="section[{{ $section->id }}]">{{ $section->content }}</textarea>
                    </div>
                   
                    <input type="hidden" name="type[]" value="1" />
                </div>

                
            @elseif($section->type==2)
                <div class="section d-block">
                    <h4>Picture section:</h4>
                  
                    <div class="w-100 d-flex justify-content-center align-items-center  flex-column">
                        <img src="{{ asset('news_images') }}/{{ $section->content }}" alt="" class="w-50 d-block mb-2">
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