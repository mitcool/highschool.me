@extends('admin_template')

@section('content')
    <div class="container shadow p-3 mt-3 text-center bg-light">
        <h2>Edit Author</h2>
            <form action="{{ route('edit-author', $author->id) }}" method="POST" enctype="multipart/form-data">
                @foreach($author->all_translations as $translation)
                    <div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold m-0">Name {{$translation->locale}} {{ $translation->name }}</label>
                            <input value="{{ $translation->name }}" required type="text" name="name_{{$translation->locale}}" class="form-control my-2" >
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold m-0">Description {{$translation->locale}} {{ $translation->name }}</label>
                            <textarea value="{{ $translation->description }}" required type="text" name="description_{{$translation->locale}}" class="form-control my-2" >{{$translation->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold m-0">Occupation {{$translation->locale}} {{ $translation->occupation }}</label>
                            <input value="{{ $translation->occupation }}" required type="text" name="occupation_{{$translation->locale}}" class="form-control my-2" >
                        </div>
                    </div>
                @endforeach
                <div>
                    <button class="btn btn-secondary">Edit Author</button>
                   
                </div>
            </form>
            <form action="{{ route('delete-author', $author->id) }}" method="POST" class="text-right">
                {{ csrf_field() }}
                <button class="btn btn-danger">Delete Author</button>
            </form>
    </div>
@endsection