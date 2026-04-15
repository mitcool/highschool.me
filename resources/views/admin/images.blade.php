@extends('admin_template')

@section('content')

<div class="shadow container wrapper">
    <div class="border" style="margin:50px 0;padding:20px;">

        <h1 class="text-center page-headings">Add new image</h1>
        <p class="text-danger text-center">*Please add image only after consultation with Web Developer</p>
        <hr>
        <form action="{{ route('add-image') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label class="m-0 font-weight-bold" for="">Nickname</label>
                    <input type="text" name="nickname" required="required" class="form-control">
                </div>
                <div class="col-md-6">
                    <label  class="m-0 font-weight-bold" for="">Image Name</label>
                    <input type="text" name="name" required="required" class="form-control">
                </div>
             
                <div class="col-md-12 my-2">
                    <hr>
                    <input type="file" name="picture" required="required" >
                    <hr>
                </div>
              
                <div class="col-md-6">
                    <label class="m-0 font-weight-bold" for="">Alt</label>
                    <input type="text" name="alt" class="form-control" required/>
                </div>
                <div class="col-md-6">
                    <label class="m-0 font-weight-bold" for="">Title</label>
                    <input type="text" name="title" class="form-control" required />
                </div>
                
            </div>
            <button class="btn my-2 btn-secondary">Add Image</button>
        </form>
        
    </div>
    <h1 class="text-center page-headings">Existing images</h1>
    <p class="text-danger text-center">In case you want to change the image please fill the Image Name field and select file less than 300KB</p>
    @foreach($images as $image)
        <div class="border text-center" style="margin:50px auto;padding:20px;">
            <x-image-component nickname="{{ $image->nickname }}"  class="w-25 shadow mx-auto"/>
            <h4 class="text-center">{{ $image->nickname }}</h4>
            <form action="{{ route('edit-image', $image->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row text-center">
                    <div class="col-md-6">
                        <label  class="m-0 font-weight-bold" for="">Image Name</label>
                        <input type="text" name="name"  class="form-control">
                    </div>
                
                    <div class="col-md-6">
                        <input type="file" name="picture"  >
                    </div>
    
                    <div class="col-md-6">
                        <label class="m-0 font-weight-bold" for="">Alt</label>
                        <input type="text" value="{{ $image->alt }}" name="alt" class="form-control" required/>
                    </div>
                    <div class="col-md-6">
                        <label class="m-0 font-weight-bold" for="">Title</label>
                        <input type="text" value="{{ $image->title }}" name="title" class="form-control" required />
                    </div>
                 
                    <div class="col-md-12 text-center">
                        <button class="btn my-2 btn-secondary">Edit Image</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">{{ $images->links() }}</div>
</div>

@endsection