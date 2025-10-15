@extends('admin_template')


@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container shadow p-3 mt-3 text-center bg-light">
    <h1>Edit Testimonial</h1>
    <form action="{{route('edit-testimonial-post',$testimonial->id)}}" method="POST">
        {{ csrf_field() }}
        @foreach ($testimonial->all_translations as $translation)
            <label for="" class="font-weight-bold m-0">Name({{ $translation->locale }})</label>
            <input value="{{ $translation->name }}" required type="text" name="name_{{ $translation->locale }}" class="form-control my-2" >
            <label for="" class="font-weight-bold m-0">Text({{ $translation->locale }})</label>
            <textarea required name="text_{{ $translation->locale }}"   class="form-control my-2 ckeditor">{{ $translation->text }}</textarea>
        @endforeach
        <div> 
            <button class="btn btn-secondary"> Edit Testimonial</button>
        </div>
    
    </form>
</div>
@endsection