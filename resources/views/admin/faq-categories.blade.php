@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container text-center my-3 shadow bg-light p-3">
    <h1>Edit Category</h1>

    @foreach($faq_categories as $category)
        <h2>Category: <span class="font-italic text-primary">{{ $category->key }}</span></h2>
        <form action="{{ route('edit-faq-category',$category->id) }}" method="POST">
            {{ csrf_field() }}
          
            <label class="font-weight-bold" for="">Name</label>
            <input required  name="name" class="form-control" id="ckeditor" value="{{$category->name }}" />
            <label class="font-weight-bold" for="">Slug</label>
            <input class="form-control" required name="slug"  value="{{ $category->slug }}" />
            <label class="font-weight-bold" for="">Meta title</label>
            <textarea required class="form-control" name="meta_title">{{ $category->meta_title }}</textarea>
            <label class="font-weight-bold" for="">Meta description</label>
            <textarea required class="form-control" name="meta_description">{{ $category->meta_description }}</textarea>
      
            <button type="submit" class="btn btn-secondary my-2">SAVE</button>
        </form>
        <hr>
    @endforeach
@endsection
</div>
