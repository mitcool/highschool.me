@extends('admin_template')

@section('content')

<div class="jumbotron container shadow bg-white">
    <h1 class="text-center">Courses</h1>

    <form action="{{ route('course.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="" class="font-weight-bold my-2">Name</label>
        <input class="form-control" type="text" name="name" required>
        <label for="" class="font-weight-bold my-2">Code</label>
        <input class="form-control" type="number" name="code" required>
        <label for="" class="font-weight-bold my-2">Type</label>
        <select class="form-control" type="number" name="type" required>
            @foreach ($courses as $course)
                <option value="0">Core Course</option>
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        <label for="" class="font-weight-bold my-4">Credits</label>
        <div>
            <input type="checkbox" name="is_required" > Is course required
        </div>
        <hr> 
        <div class="text-center">
            <button class="btn btn-info">Add course</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">Course list</h2>
    @foreach ($courses_type as $type )
        <li class="list-group-item d-flex justify-content-between">
            {{ $type->name }}   
            <div class="d-flex">
                <a class="btn btn-warning" href="{{ route('course-type.edit',$course->id) }}">Edit Course</a> &nbsp; 
                <form action="{{ route('course.delete',$course->id) }}" class="confirm-first">
                    {{ csrf_field() }}
                     <button class="btn btn-danger">Delete Course</button>
                </form>
            </div>
        </li>
    @endforeach
</div>

@endsection