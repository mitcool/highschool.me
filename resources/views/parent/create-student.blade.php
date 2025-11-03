@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">Add child</h1>
    <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Fullname</label>
            <input type="text" required name="name" class="form-control">
        </div>
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Email</label>
            <input type="email" required name="email" class="form-control">
        </div>
        
         <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 1</label>
            <input class="form-control" name="document1" required type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 2</label>
            <input class="form-control" name="document2" required type="file" id="formFile">
        </div>
            <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 3</label>
        <input class="form-control" name="document3" required type="file" id="formFile">
        </div>
        <hr>
        <div class="text-right">
            <button class="shadow orange-button">Send</button>
        </div>
    </form>
</div>
@endsection