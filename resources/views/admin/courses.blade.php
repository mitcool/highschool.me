@extends('admin_template')

@section('content')

<div class="jumbotron container shadow bg-white">
    <h1 class="text-center">Courses</h1>

    <form action="{{ route('course.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="" class="font-weight-bold my-2">Name</label>
        <input class="form-control" type="text" name="name" required>
        <label for="" class="font-weight-bold my-2">Description</label>
        <input class="form-control" type="text" name="description" required>
        <label for="" class="font-weight-bold my-4">File</label>
        <input type="file" name="image" required>
        <button class="btn btn-info">Add course</button>
    </form>
</div>

@endsection