@extends('admin_template')

@section('content')
<div class="container shadow mx-auto" style="padding:30px; margin-top:20px;">
    <form action="{{ route('admin.edit-single-student-in-spotlight', $student->id) }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h3 class="text-center">Edit Student in Spotlight</h3>   
        <div class="row">
            <div class="col-md-12 my-2">
                <input type="text" name="name" required class="form-control" placeholder="Name" value="{{ $student->name }}">
            </div>

            <div class="col-md-12 my-2">
                <select class="form-control" name="category_id">
                    <option value="{{ $student->category->id }}">{{ $student->category->category }}</option>
                    <optgroup label="Select new category">
	                    @foreach($categories as $category)
	                        <option value="{{ $category->id }}">{{ $category->category }}</option>
	                    @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="col-md-12 my-2">
                <textarea  rows="5" name="description" required class="form-control" placeholder="Description">{{ $student->description }}</textarea>
            </div>

            <div class="col-md-6 my-2">
                <div class="custom-file">
                    <input type="file" name="picture" class="custom-file-input" id="avatar">
                    <label class="custom-file-label" for="avatar">Picture </label>
                </div>
                <span class="text-primary" style="font-size:14px"> *Please upload file up to 200KB </span> 
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <button class="btn btn-info">Edit Student</button>
            </div>
        </div>
    </form>
</div>
@endsection