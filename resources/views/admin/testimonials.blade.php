@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container shadow p-3 mt-3 text-center bg-light">
    <h1>Add New Testimonial</h1>
    <form action="{{route('add-testimonial')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @foreach (Config('languages') as $lang => $language)
            <input required type="text" name="name_{{ $lang }}" class="form-control my-2" placeholder="Name({{ $lang }})">
            <textarea required name="text_{{ $lang }}"  cols="30" rows="10" class="ckeditor my-2" placeholder="Text({{ $lang }})"></textarea>
        @endforeach
        <hr>
        <div> 
            <hr>
            <button class="btn btn-secondary"> Add Testimonial</button>
        </div>
       
    </form>
    <hr>
    <h1>Delete Testimonial</h1>
    @foreach($testimonials as $testimonial)
    <div class="shadow w-100 my-3 p-3 d-flex justify-content-between bg-white" >
        <h3>{{ $testimonial->translated->name }}</h3>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('edit-testimonial',$testimonial->id) }}" class="btn btn-secondary">Edit</a> &nbsp;
            <form action="{{ route('delete-testimonial',$testimonial->id) }}" method="POST" onsubmit="confirm(are you sure)">
                {{ csrf_field() }}
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>



@endsection