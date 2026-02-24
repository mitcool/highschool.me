@extends('admin_template')

@section('content')

<div class="jumbotron container shadow bg-white">
    <h1 class="text-center">Course Types</h1>

    <form action="{{ route('course-type.update',$course->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="" class="font-weight-bold my-2">Name</label>
        <input class="form-control" type="text" name="name" required value="{{ $course->name }}">
        <label for="" class="font-weight-bold my-2">Description</label>
        <textarea class="ckeditor form-control" type="text" name="description" required >{!! $course->description !!}</textarea>
        <label for="" class="font-weight-bold my-2">Price</label>
        <input class="form-control" type="number" name="price" required value="{{ $course->price }}">
        <hr>
        <div class="text-center">
            <button class="btn btn-info">Update Course type</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">Course Types list</h2>
    @foreach ($courses as $course )
        <li class="list-group-item d-flex justify-content-between">
            {{ $course->name }}   
            <div class="d-flex">
                <a class="btn btn-warning" href="{{ route('course-type.edit',$course->id) }}">Edit Course Type</a> &nbsp; 
                <form action="{{ route('course-type.delete',$course->id) }}" class="confirm-first" method="POST">
                    {{ csrf_field() }}
                     <button class="btn btn-danger">Delete Course Type</button>
                </form>
            </div>
        </li>
    @endforeach
</div>

@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection