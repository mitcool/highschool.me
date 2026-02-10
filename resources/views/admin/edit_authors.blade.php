@extends('admin_template')
@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection
@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h1>Add Author</h1>
    <div>
        <form action="{{ route('add-author')}}" enctype="multipart/form-data" method="POST">
            <input required type="text" name="name" class="form-control my-2" placeholder="Name">
            <textarea style="width:100%" required class="form-control" rows="5" name="description" placeholder="Description"></textarea> 
            <input required type="text" name="slug" class="form-control my-2" placeholder="Slug">
            <br>
            <div class="custom-file">
                <input type="file" name="picture" class="custom-file-input" id="avatar" required>
                <label class="custom-file-label mx-0" for="avatar">Picture </label>
            </div>
            <span class="text-primary" style="font-size:14px">Upload a file up to 200 KB</span> 
            <br>
            <br>
           
            <div class="d-flex justify-content-center">
                <button class="btn orange-button">Add Author</button>
            </div>
        </form>
        <hr>
        <h2 class="text-center">Current authors</h2>
         <ul class="list-group text-center">
        @foreach($authors as $a)
            <a href="{{route('show-author',$a->id)}}">
                <li class="list-group-item">{{$a->name}}</li>
            </a>
        @endforeach
    </ul>
    </div>
</div> 

@endsection
