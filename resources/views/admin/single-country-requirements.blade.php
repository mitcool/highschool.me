@extends('admin_template')

@section('css')
<style>
    form label{
        font-weight: bold;
        margin-bottom: 0;
        margin-top:10px;
    }
</style>

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection
@section('content')

<div class="shadow container wrapper">
    
    <h2 class="text-center font-weight-bold h2" style="margin-top:40px;"><img style="height: 30px;width:50px;" src="{{ asset('images/flags') }}/{{ $country->flag }}" alt="" class="border">
        {{ $country->nicename }} - Country Requirements  </h2>

    <form action="" class="row">
        {{ csrf_field() }}
        <div class="col-md-4">
            <label for="meta_title">Meta title</label>
            <input id="meta_title" name="meta_title" type="text" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="meta_description">Meta description</label>
            <input id="meta_description" name="meta_description" type="text" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="slug">Slug</label>
            <input id="slug" name="slug" type="text" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="processing-time">Intro</label>
            <textarea name="intro" class="ckeditor" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="col-md-12">
            <label for="fee">Cover</label>
            <input id="fee" name="cover" type="file" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="required-documents">Required documents</label>
            <input id="required-documents" name="required_documents" type="text" class="form-control">
        </div>
    </form>
</div>
@endsection
