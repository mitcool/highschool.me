@extends('admin_template')


@section('content')

@extends('admin_template')
@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection
@section('content')

<div class="container shadow p-3 mt-3 text-center bg-light">
    <h1>Edit Tutorial</h1>
    <form action="{{route('edit-tutorial-post',$tutorial->id)}}" method="POST">
        {{ csrf_field() }}
        @foreach ($tutorial->all_translations as $translation)
            <label for="" class="font-weight-bold m-0">Name({{ $translation->locale }})</label>
            <input value="{{ $translation->name }}" required type="text" name="name_{{ $translation->locale }}" class="form-control my-2" >
            <label for="" class="font-weight-bold m-0">Text({{ $translation->locale }})</label>
            <textarea required name="text_{{ $translation->locale }}"  cols="30" rows="10" class="ckeditor my-2">{{ $translation->text }}</textarea>
           
            @if($tutorial->type == 0)
                <label for="" class="font-weight-bold m-0">Slug({{ $translation->locale }})</label>
                <input value="{{ $translation->slug }}" required type="text" name="slug_{{ $translation->locale }}" class="form-control my-2" >
            @endif
        @endforeach
        @if($tutorial->type == 1)
            <label for="" class="font-weight-bold m-0">Related Program</label>
            <select class="form-control" name="program">
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" {{ $program->translated->slug == $tutorial->translated->slug ? ' selected' : '' }}>{{ $program->translated->name }}</option>
                @endforeach
            </select>
        @endif
        <div> 
            <hr>
            <button class="btn btn-secondary"> Edit Tutorial</button>
        </div>
    
    </form>
</div>
@endsection
