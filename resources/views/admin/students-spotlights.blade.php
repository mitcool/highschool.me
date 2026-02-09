@extends('admin_template')

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

    <form action="{{ route('admin.add-student-in-spotlight') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h3 class="text-center">Add Student in Spotlight</h3>   
        <div class="row">
            <div class="col-md-12 my-2">
                <input type="text" name="name" required class="form-control" placeholder="Name">
            </div>

            <div class="col-md-12 my-2">
                <select class="form-control" name="category_id">
                    <option>-- Select category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 my-2">
                <textarea  rows="5" name="description" required class="form-control" placeholder="Description"></textarea>
            </div>

            <div class="col-md-6 my-2">
                <div class="custom-file">
                    <input type="file" name="picture" class="custom-file-input" id="avatar" required>
                    <label class="custom-file-label" for="avatar">Picture </label>
                </div>
                <span class="text-primary" style="font-size:14px"> *Please upload file up to 200KB </span> 
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <button class="btn btn-info">Add Student</button>
            </div>
        </div>
        <hr>
        <h3 class="text-center">List with existing students in spotlights</h3>
        <ul class="list-group text-center">
            @foreach($students as $student)
            <a href="{{ route('admin.edit-single-student', $student->id) }}">
                <li class="list-group-item">{{$student->name}}</li>
            </a>
            @endforeach
        </ul>  
    </form>
</div>
@endsection