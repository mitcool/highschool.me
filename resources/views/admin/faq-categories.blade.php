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
            @foreach($category->all_translations as $translation)
            <label class="font-weight-bold" for="">Name ({{ $translation->locale }})</label>
            <input required  name="name_{{ $translation->locale }}" class="form-control" id="ckeditor-{{ $translation->id }}" value="{{$translation->name }}" />
            <label class="font-weight-bold" for="">Slug({{ $translation->locale }})</label>
            <input class="form-control" required name="slug_{{ $translation->locale }}"  value="{{ $translation->slug }}" />
            <label class="font-weight-bold" for="">Meta title({{ $translation->locale }})</label>
            <textarea required class="form-control" name="meta_title_{{ $translation->locale }}">{{ $translation->meta_title }}</textarea>
            <label class="font-weight-bold" for="">Meta description({{ $translation->locale }})</label>
            <textarea required class="form-control" name="meta_description_{{ $translation->locale }}">{{ $translation->meta_description }}</textarea>
            @endforeach
            <button type="submit" class="btn btn-secondary my-2">SAVE</button>
        </form>
        <hr>
    @endforeach
@endsection
</div>
