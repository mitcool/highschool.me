@extends('admin_template')

@section('content')

<div class="container text-center">
    <div class="shadow" style="margin:50px 0;padding:20px;">

        <h1 class="text-center">Add new image</h1>
        <p class="text-danger">*Please add image only after consultation with Web Developer</p>
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
                @foreach(Config('languages') as $lang => $language)
                <div class="col-md-6">
                    <label class="m-0 font-weight-bold" for="">Alt ({{$lang }})</label>
                    <input type="text" name="alt_{{ $lang }}" class="form-control" required/>
                </div>
                <div class="col-md-6">
                    <label class="m-0 font-weight-bold" for="">Title ({{ $lang }})</label>
                    <input type="text" name="title_{{ $lang }}" class="form-control" required />
                </div>
                @endforeach
            </div>
            <button class="btn my-2 btn-secondary">Add Image</button>
        </form>
        
    </div>
    <h1 class="text-center">Existing images</h1>
    <p class="text-danger">In case you want to change the image please fill the Image Name field and select file less than 300KB</p>
    @foreach($images as $image)
        <div class="shadow" style="margin:50px 0;padding:20px;">

            <x-image-component nickname="{{ $image->nickname }}"  class="w-50 shadow"/>
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
    
                    @foreach($image->attributes as $attribute)
                    <div class="col-md-6">
                        <label class="m-0 font-weight-bold" for="">Alt ({{$attribute->locale }})</label>
                        <input type="text" value="{{ $attribute->alt }}" name="alt_{{ $attribute->locale }}" class="form-control" required/>
                    </div>
                    <div class="col-md-6">
                        <label class="m-0 font-weight-bold" for="">Title ({{ $attribute->locale }})</label>
                        <input type="text" value="{{ $attribute->title }}" name="title_{{ $attribute->locale }}" class="form-control" required />
                    </div>
                    @endforeach
                    <div class="col-md-12 text-center">
                        <button class="btn my-2 btn-secondary">Edit Image</button>
                    </div>
                </div>
            </form>
            
        </div>
       
    @endforeach
</div>

@endsection