@extends('admin_template')

@section('content')
    <div class="container shadow p-3 mt-3 text-center bg-light">
        <h2>Edit Author</h2>
        <form action="{{ route('edit-author', $author->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="font-weight-bold m-0">Name </label>
                <input value="{{ $author->name }}" required type="text" name="name" class="form-control my-2" >
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold m-0">Description </label>
                <textarea value="{{ $author->description }}" required type="text" name="description" class="form-control my-2" >{{$author->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold m-0">Slug </label>
                <input value="{{ $author->slug }}" required type="text" name="slug" class="form-control my-2" >
            </div>
            <button class="btn btn-secondary">Edit Author</button>

        </form>
        <form action="{{ route('delete-author', $author->id) }}" method="POST" class="text-right">
            {{ csrf_field() }}
            <button class="btn btn-danger">Delete Author</button>
        </form>
    </div>
@endsection