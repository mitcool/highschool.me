@extends('admin_template')


@section('content')

@extends('admin_template')
@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection
@section('content')

<div class="container shadow p-3 mt-3 text-center bg-light">
    <h1>Add Author</h1>
    <div>
        <form action="{{ route('add-author')}}" enctype="multipart/form-data" method="POST">
            @foreach(Config::get('languages') as $lang => $language)
                <span><strong>Language ({{ $lang }})</span>
                <input required type="text" name="name_{{ $lang }}" class="form-control my-2" placeholder="Name({{ $lang }})">
                <input required type="text" name="occupation_{{ $lang }}" class="form-control my-2" placeholder="Occupation({{ $lang }})">
                <textarea style="width:100%" required name="description_{{ $lang }}" placeholder="  Long description({{ $lang }})"></textarea> 
                <input required type="text" name="slug_{{ $lang }}" class="form-control my-2" placeholder="Slug({{ $lang }})">
                <br>
            @endforeach
            <div class="col-md-12">
                <div class="custom-file">
                    <input type="file" name="picture" class="custom-file-input" id="avatar" required>
                    <label class="custom-file-label" for="avatar">Picture </label>
                </div>
                <span class="text-primary" style="font-size:14px">Upload a file up to 200 KB</span> 
                <br><br>
            </div>
            <div>
                <button class="btn btn-secondary">Add Author</button>
            </div>
        </form>
    </div>
</div> 

<div class="container shadow p-3 mt-3 text-center bg-light">
    <ul class="list-group text-center">
        @foreach($authors as $a)
            <a href="{{route('show-author',$a->id)}}">
                <li class="list-group-item">{{$a->translated->name}}</li>
            </a>
        @endforeach
    </ul>
</div> 
@endsection
