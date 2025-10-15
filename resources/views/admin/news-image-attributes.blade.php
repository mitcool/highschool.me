@extends('admin_template')

@section('content')

@foreach($images as $image)

<form action="{{ route('change-image-attributes',$image->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="{{ asset('news_images') }}/{{ $image->all_translations[0]->content }}" class="w-50 my-2" />
        </div>
        <div class="col-md-3">
            <label>Alt attribute (EN)</label>
            <input type="text" name="alt_en" class="form-control" placeholder="Alt (En)" required value="{{ $image->attributes ? $image->attributes->alt_en : '' }}">
        </div>
        <div class="col-md-3">
            <label>Alt attribute (DE)</label>
            <input type="text" name="alt_de" class="form-control" placeholder="Alt (De)" required value="{{ $image->attributes ? $image->attributes->alt_de : '' }}">
        </div>
        <div class="col-md-3">
            <label>Title attribute (EN)</label>
            <input type="text" name="title_en" class="form-control" placeholder="Title (En)" required value="{{ $image->attributes ? $image->attributes->title_en : '' }}">
        </div>
        <div class="col-md-3">
            <label>Title attribute (DE)</label>
            <input type="text" name="title_de" class="form-control" placeholder="Title (De)" required value="{{ $image->attributes ? $image->attributes->title_de : '' }}">
        </div>
        <div class="col-md-12 text-center my-3">
            <input type="submit" class="btn btn-primary">
        </div>
    </div>
</form>
<hr>
@endforeach

@endsection