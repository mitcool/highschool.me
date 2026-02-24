@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

    <h2 class="text-center">Course Types</h2>

    <form action="{{ route('course-types.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="" class="font-weight-bold my-2">Name</label>
        <input class="form-control" type="text" name="name" required>
        <label for="" class="font-weight-bold my-2">Description</label>
        <input class="form-control" type="text" name="description" required>
        <label for="" class="font-weight-bold my-2">Price</label>
        <input class="form-control" type="number" name="price" required>
        <label for="" class="font-weight-bold my-4">File</label>
        <input type="file" name="image" required>
        <hr>
        <div class="text-center">
            <button class="btn btn-info">Add Course Type</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">Course Type list</h2>
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