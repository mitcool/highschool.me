@extends('admin_template')

@section('css')
<style>
    table.table th, 
    table.table td{
        vertical-align: middle !important;
    }
    
</style>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content') 
    <div class="container shadow p-3 mt-3 text-center bg-light">
    <h2>Add New Service</h2>
    <div>
        <form action="{{ route('add-ai-service')}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row text-left">
                <div class="col-md-6">
                    <h5 class="text-center font-weight-bold">English</h5>
                    <label class="mb-0 font-weight-bold" for="">Name</label>
                    <input required type="text" name="name" class="form-control my-2" value="{{ old('name') }}" required>
                    <label class="mb-0 font-weight-bold" for="">Prompt</label>
                    <textarea name="question" id="" cols="30" rows="10" class="form-control my-2">{{ old('question') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Page description  (Dashboard)</label>
                    <textarea name="description" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('description') }}</textarea>
                     <label class="mb-0 font-weight-bold" for="">Public page  (Top)</label>
                    <textarea name="public_page_top" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('public_page_top') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Public page  (Bottom)</label>
                    <textarea name="public_page_bottom" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('public_page_bottom') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Slug</label>
                    <input required type="text" name="slug" class="form-control my-2"  required value="{{ old('slug') }}">
                    <label class="mb-0 font-weight-bold" for="">Meta title</label>
                    <input required type="text" name="meta_title" class="form-control my-2"  required value="{{ old('meta_title') }}">
                    <label class="mb-0 font-weight-bold" for="">Meta description</label>
                    <textarea name="meta_description" id="" cols="30" rows="10" class="form-control my-2">{{ old('meta_description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <h5 class="text-center font-weight-bold">German</h5>
                    <label class="mb-0 font-weight-bold" for="">Name</label>
                    <input required type="text" name="name_de" class="form-control my-2"  required value="{{ old('name_de') }}">
                    <label class="mb-0 font-weight-bold" for="">Prompt</label>
                    <textarea name="question_de" id="" cols="30" rows="10" class="form-control my-2">{{ old('question_de') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Page description (Dashboard)</label>
                    <textarea name="description_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('description_de') }}</textarea>
                      <label class="mb-0 font-weight-bold" for="">Public page  (Top)</label>
                    <textarea name="public_page_top_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('public_page_top_de') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Public page  (Bottom)</label>
                    <textarea name="public_page_bottom_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ old('public_page_bottom_de') }}</textarea>
                    <label class="mb-0 font-weight-bold" for="">Slug</label>
                    <input required type="text" name="slug_de" class="form-control my-2" value="{{ old('slug_de') }}"  required>
                    <label class="mb-0 font-weight-bold" for="">Meta title</label>
                    <input required type="text" name="meta_title_de" class="form-control my-2"  required value="{{ old('meta_title_de') }}">
                    <label class="mb-0 font-weight-bold" for="">Meta description</label>
                    <textarea name="meta_description_de" id="" cols="30" rows="10" class="form-control my-2">{{ old('meta_description_de') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="mb-0 font-weight-bold" for="">Category</label>
                    <select name="category_id" required class="form-control">
                        <option value="" selected disabled>Please select category</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="mb-0 font-weight-bold" for="">Max Tokens</label>
                   <input required type="text" name="max_tokens" class="form-control my-2"  required value="{{ old('max_tokens') }}">
                </div>
                <div class="col-md-6">
                    <label class="mb-0 font-weight-bold" for="">Temperature</label>
                  <input required type="text" name="temperature" class="form-control my-2"  required value="{{ old('temperature') }}">
                </div>
                <div class="col-md-12">
                    <label for="">Cover</label>
                    <input type="file" name="cover" class="form-control my-2">
                </div>
                <div class="col-md-6">
                    <label for="">Alt En</label>
                    <input type="text" name="alt_en" class="form-control my-2" value="{{ old('alt_en') }}">
                </div>
                <div class="col-md-6">
                    <label for="">Alt De</label>
                    <input type="text" name="alt_de" class="form-control my-2" value="{{ old('alt_de') }}">
                </div>
                <div class="col-md-6">
                    <label for="">Title En</label>
                    <input type="text" name="title_en" class="form-control my-2" value="{{ old('title_en') }}">
                </div>
                <div class="col-md-6">
                    <label for="">Title De</label>
                    <input type="text" name="title_de" class="form-control my-2" value="{{ old('title_de') }}">
                </div>
            </div>
            <br>
            <button class="btn btn-secondary">Add Service</button>
        </form>
    </div>
    <hr>
    <h2 class="my-3">List of all services</h2>
    <table class="table text-left table-striped" style="vertical-align: center;">
        <tr>
            <th scope="row">Name</th>
            <th>Email</th>
            <th>Tokens</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($services  as $s )
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->tokens }}</td>
                <td class="text-warning text-center" style="cursor: pointer;" data-toggle="modal" data-target="#user-modal-{{ $s->id }}">
                    Edit
                </td>
                <td class="text-danger text-center">
                   <form action="{{ route('delete-ai-service',$s->id) }}" method="POST" class="confirm-first" id="delete-ai-service-{{ $s->id }}">
                        {{ csrf_field() }}
                        <button class="btn btn-link">Delete</button>
                   </form>
                </td>
            </tr>
           <div class="modal fade" id="user-modal-{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <form action="{{ route('edit-ai-service',$s->id)}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="row text-left">
                            <div class="col-md-6">
                                <h5 class="text-center font-weight-bold">English</h5>
                                <label class="mb-0 font-weight-bold" for="">Name</label>
                                <input required type="text" name="name" value="{{ $s->name }}" class="form-control my-2"  required>
                                <label class="mb-0 font-weight-bold" for="">Prompt description</label>
                                <textarea name="question" id="" cols="30" rows="10" class="form-control my-2">{{ $s->question }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Page description  (Dashboard)</label>
                                <textarea name="description" id="" cols="30" rows="10" class="ckeditor my-2">>{{ $s->description }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Public page  (Top)</label>
                                <textarea name="public_page_top" id="" cols="30" rows="10" class="ckeditor my-2">{{ $s->public_page_top }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Public page  (Bottom)</label>
                                 <textarea name="public_page_bottom" id="" cols="30" rows="10" class="ckeditor my-2">{{ $s->public_page_bottom }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Slug</label>
                                <input required type="text" name="slug" class="form-control my-2" required value="{{ $s->slug }}">
                                 <label class="mb-0 font-weight-bold" for="">Meta title</label>
                                <input required type="text" name="meta_title" class="form-control my-2"  required value="{{ $s->meta_title }}">
                                <label class="mb-0 font-weight-bold" for="">Meta description</label>
                                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control my-2">{{$s->meta_description }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center font-weight-bold">German</h5>
                                <label class="mb-0 font-weight-bold" for="">Name</label>
                                <input required type="text" name="name_de" class="form-control my-2"  required value="{{ $s->name_de }}">
                                <label class="mb-0 font-weight-bold" for="">Prompt description</label>
                                <textarea name="question_de" id="" cols="30" rows="10" class="form-control my-2">{{ $s->question_de }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Page description  (Dashboard)</label>
                                <textarea name="description_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ $s->description_de }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Public page  (Top)</label>
                                <textarea name="public_page_top_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ $s->public_page_top_de }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Public page  (Bottom)</label>
                                <textarea name="public_page_bottom_de" id="" cols="30" rows="10" class="ckeditor my-2">{{ $s->public_page_bottom_de }}</textarea>
                                <label class="mb-0 font-weight-bold" for="">Slug</label>
                                <input required type="text" name="slug_de" class="form-control my-2"  required value="{{ $s->slug_de }}">
                                <label class="mb-0 font-weight-bold" for="">Meta title</label>
                                <input required type="text" name="meta_title_de" class="form-control my-2"  required value="{{ $s->meta_title_de }}">
                                <label class="mb-0 font-weight-bold" for="">Meta description</label>
                                <textarea name="meta_description_de" id="" cols="30" rows="10" class="form-control my-2">{{$s->meta_description_de }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0 font-weight-bold" for="">Category</label>
                                <select name="category_id" required class="form-control">
                                    <option value="" selected disabled>Please select category</option>
                                    @foreach ($categories as $c)
                                        <option {{ $s->category_id == $c->id ? ' selected ' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             
                                <div class="col-md-6">
                                    <label class="mb-0 font-weight-bold" for="">Max Tokens</label>
                                <input required type="text" name="max_tokens" class="form-control my-2"  required value="{{ $s->max_tokens }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0 font-weight-bold" for="">Temperature</label>
                                <input required type="text" name="temperature" class="form-control my-2"  required value="{{ $s->temperature }}">
                                </div>
                                 <div class="col-md-12">
                                <label for="">Cover</label>
                                    <input type="file" name="cover" class="form-control my-2" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Alt En</label>
                                        <input type="text" name="alt_en" class="form-control my-2" value="{{ $s->alt_en }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Alt De</label>
                                        <input type="text" name="alt_de" class="form-control my-2" value="{{ $s->alt_de }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Title En</label>
                                        <input type="text" name="title_en" class="form-control my-2" value="{{ $s->title_en }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Title De</label>
                                        <input type="text" name="title_de" class="form-control my-2" value="{{ $s->title_de }}">
                                    </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-secondary">Update Service</button>
                                </form>
                            </div>
                </div>
            </div>
            </div>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {{ $services->links() }}
    </div>
</div> 
@endsection