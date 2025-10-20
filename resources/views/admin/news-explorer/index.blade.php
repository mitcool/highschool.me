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

    <h2>Create a news</h2>
    <hr>
    <form action="{{ route('dynamic-news-create') }}" method="POST" enctype="multipart/form-data" id="create_news_form">
        {{ csrf_field() }}
        <div class="row mt-1">
             <div class="col-md-6"></div>
            <div class="col-md-12">
                <label for="" class="font-weight-bold">Author:</label>
                <select name="author_id" id=""  required class="form-control">
                    <option value="" disabled selected>Please select an author</option>
                    @foreach ($authors as $author) 
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Slug(EN)</label>
                <input type="text" name="slug" class="form-control" required />
            </div>
           
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Key Facts(EN)</label>
                <textarea  name="key_facts_en" class="form-control ckeditor"></textarea>
            </div>
            
			<div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Meta title(EN)</label>
				<textarea  name="meta_title_en" class="form-control" required ></textarea>
            </div>
           
			<div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Meta description (EN)</label>
                <textarea  name="meta_description_en" class="form-control" required ></textarea>
            </div>
           
            <div class="col-md-12">
                <label for="" class="font-weight-bold mb-0">Min to read</label>
                <input type="number" name="minutes" class="form-control" required />
            </div>
        </div>
        <hr>
        <label for="" class="font-weight-bold mb-0 d-block">Content:</label>
        <div class="section row">
            <div class="col-md-12">
                <h4>Main Heading section*</h4>
            </div>
            <div class="col-md-12">
                <label class="m-0 font-weight-bold">Content(EN)</label>
                <textarea class="form-control" name="content[]"></textarea>
            </div>
            
            <input type="hidden" name="type[]" value="1" />
        </div>
        <div class="section row">
            <div class="col-md-12">
                <h4>Main Description section*</h4>
            </div>
            <div class="col-md-12">
                <label class="m-0 font-weight-bold">Content(EN)</label>
                <textarea class="form-control ckeditor" name="content[]"></textarea>
            </div>
          
            <input type="hidden" name="type[]" value="1" />
        </div>
        
        <div id="news_content">

        </div>
        <hr>
        <div class="text-center">
            <button class="btn btn-info" data-toggle="modal" data-target="#type_modal"type="button">+ Add new section</button>
        </div>
       
        <div class="d-flex justify-content-center my-2">
            <button class="btn btn-warning">Publish News</button>
        </div>
    </form>
    <h1>List of news news:</h1>
    @foreach($news as $n)
    <hr />
    {!! $n->sections[0]->translated->content !!}
    <div class="text-right d-flex justify-content-end">
        <a href="{{ route('edit-news',$n->id) }}" class="btn btn-warning mr-2">Edit News</a>
        <form action="{{ route('delete-news',$n->id) }}" method="POST" class="text-right">
            {{ csrf_field() }}
            <button class="btn btn-danger">Delete News</button>
        </form>
    </div>
    @endforeach
</div>
<div class="col-md-6" style="margin:0 auto; justify-items: center;">{{$news->links()}}</div>

<div class="modal fade bd-example-modal-lg" id="type_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="row m-0">
            <div class="col-md-12 p-2">
                <img src="{{ asset('images/admin/text.png') }}"  class="w-100 border options" data-value="1"/> 
                <p class="font-weight-bold text-center">Text</p>  
            </div>
            <div class="col-md-12 p-2">
                <img src="{{ asset('images/admin/image.jpg') }}" class="w-100 border options" data-value="2" />
                <p class="font-weight-bold text-center">Image</p>
            </div> 
            <div class="col-md-12 p-2">
                <img src="{{ asset('images/admin/blockquote.png') }}" class="w-100 border options" data-value="3" />
                <p class="font-weight-bold text-center">Blockquote</p>
            </div> 
            <div class="col-md-12 p-2">
                <img src="{{ asset('images/admin/table.png') }}"  class="w-100 border options" data-value="4"/>
                <p class="font-weight-bold text-center">Table</p>
            </div>         
            <div class="col-md-12 p-2 text-center">
                <hr>
                <button class="btn btn-info" id="add_section">Add section</button>    
            </div>  
            <input type="hidden" id="type" value="">
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<script>
   
     $(document).on('click','.close-section', function(){
        $(this).closest('.section').remove();
    });

    

    $(document).ready(function(){

        $('#create_news_form').on('submit', function(e){

            if($('.image-section').length < 1){
                alert('Please add at least one image section');
                e.preventDefault();
                return;
            }
            else if($('.text-section').length < 1){
                alert('Please add at least one text section');
                e.preventDefault();
                return;
            }
            else{
                return confirm('Are you sure?');
            }
            
           
        });
        $('.options').on('click', function(){
            $('.options').removeClass('selected-image');
            $(this).addClass('selected-image');
            let value = $(this).attr('data-value');
            $('#type').val(value);
        });

        $('#add_section').on('click', function(){
            let type = $('#type').val();
            let html = '';
            let section = $('.section').length + 1;
            if(type  == 1){
                html = `<div class="section row text-section">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <span style="font-size:30px;cursor:pointer" class="close-section">&times;</span>
                                </div>
                                <h4>Text section:</h4>
                            </div>
                            <div class="col-md-6">
                                <label class="m-0 font-weight-bold">Content(EN)</label>
                                <textarea class="ckeditor" id="text-en-${section}" name="content[]"></textarea>
                            </div>
                            
                            <input type="hidden" name="type[]" value="1" />
                        </div>`;
                $('#type_modal').modal('hide');
                $('.options').removeClass('selected-image');
                $('#type').val('');
            }
            else if(type  == 2){
                html = `<div class="section d-block image-section">
                            <div class="text-right">
                                <span style="font-size:30px;cursor:pointer" class="close-section">&times;</span>
                            </div>
                            <h4>File section:</h4>
                            <input type="file" name="file_${section}" required>
                            <input type="hidden" name="content[]" value="2">
                            <input type="hidden" name="content_de[]" value="2">
                            <input type="hidden" name="type[]" value="2">
                        </div>`;
                $('#type_modal').modal('hide');
                $('.options').removeClass('selected-image');
                $('#type').val('');
            }
            else if(type  == 3){
                html = `<div class="section row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <span style="font-size:30px;cursor:pointer" class="close-section">&times;</span>
                                </div>
                                <h4>Blockquote section:</h4>
                            </div>
                            <div class="col-md-6">
                                <label class="m-0 font-weight-bold">Quote(En)</label>
                                <textarea class="form-control" name="content[]"></textarea>
                                <label class="m-0 font-weight-bold">Quote Author(En)</label>
                                <input type="text" class="form-control my-1"  name="details[${section}][]" required/>
                            </div>
                         

                            <input type="hidden" name="type[]" value="3" />
                           
                        </div>`;
                $('#type_modal').modal('hide');
                $('.options').removeClass('selected-image');
                $('#type').val('');
            }
            else if(type == 4){
                html = `<div class="section row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <span style="font-size:30px;cursor:pointer" class="close-section">&times;</span>
                                </div>
                                <h4>Table section:</h4>
                               
                            </div>
                            <div class="col-md-6">
                                <label class="font-weight-bold mb-0">Heading(EN)</label>
                                <textarea class="form-control" name="content[]"></textarea>
                                <label class="font-weight-bold mb-0">Box 1(EN)</label>
                                <textarea class="form-control" name="details[${section}][]"></textarea>
                                <label class="font-weight-bold mb-0">Box 2(EN)</label>
                                <textarea class="form-control" name="details[${section}][]"></textarea>
                                <label class="font-weight-bold mb-0">Box 3(EN)</label>
                                <textarea class="form-control" name="details[${section}][]"></textarea>
                            </div>
                          
                            <input type="hidden" name="type[]" value="4">
                        </div>`;
                $('#type_modal').modal('hide');
                $('.options').removeClass('selected-image');
                $('#type').val('');
            }
            else{
                alert('Please select a category first')
            }
            $('#news_content').append(html);

            $('.ckeditor').each(function(){
                CKEDITOR.replace($(this).attr('id'),);
            })
      
        });

    })
    
</script>

@endsection