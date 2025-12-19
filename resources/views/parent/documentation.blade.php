@extends('parent.dashboard')

@section('content')


<div class="shadow container jumbotron bg-white">
     
    <h1 class="text-center" style="color:#003A6B;">Submit Documents</h1>

    <form action="">
        <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 1</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 2</label>
            <input class="form-control" type="file" id="formFile">
        </div>
            <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 3</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="formFile" class="font-weight-bold mb-0 ">Document 4</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="text-center">
            <button class="btn btn-info">Upload Documents</button>
        </div>
    </form>
   
</div>
@endsection