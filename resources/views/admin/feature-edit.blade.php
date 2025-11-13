@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')

<div class="jumbotron container">
    <h2 class="text-center">Edit Feature ({{ $feature->feature }})</h2>
    <p class="text-danger">* For showing icon in public page please write "Yes" or "No" for plans value</p>
    <form action="{{ route('feature.update',$feature->id) }}" method="POST">
        {{ csrf_field() }}
        <label for="" class="mb-0 font-weight-bold">Feature Name</label>
        <input type="text" name="feature" class="form-control my-2" required value="{{ $feature->feature }}">
        <label for="" class="mb-0 font-weight-bold">Core Plan</label>
        <input type="text" name="core" class="form-control my-2" required value="{{ $feature->core }}">
        <label for="" class="mb-0 font-weight-bold">Pro Plan</label>
        <input type="text" name="pro" class="form-control my-2" required value="{{ $feature->pro }}">
        <label for="" class="mb-0 font-weight-bold">Elite Plan</label>
        <input type="text" name="elite" class="form-control my-2" required value="{{ $feature->elite }}">
        <label for="" class="mb-0 font-weight-bold">Core Tootltip(optional)</label>
        <textarea class="ckeditor" name="core_tooltip" id="" cols="30" rows="10">{!! $feature->core_tooltip !!}</textarea>
        <label for="" class="mb-0 font-weight-bold">Pro Tootltip(optional)</label>
        <textarea class="ckeditor" name="pro_tooltip" id="" cols="30" rows="10">{!! $feature->pro_tooltip !!}</textarea>
        <label for="" class="mb-0 font-weight-bold">Elite Tootltip(optional)</label>
        <textarea class="ckeditor" name="elite_tooltip" id="" cols="30" rows="10"> {!! $feature->elite_tooltip !!} </textarea>
         <label for="" class="mb-0 font-weight-bold">Slug</label>
        <input type="text" name="slug" class="form-control my-2" required value="{{ $feature->slug }}">
        <label for="" class="mb-0 font-weight-bold">Category</label>
        <select name="category_id" id="" class="form-control my-2" required>
            <option value="" disabled selected>Please select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $feature->category_id ? ' selected ' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="text-center">
            <button class="btn my-2 btn-info" >Update feature</button>
        </div>  
    </form>
    <hr>
    
</div>


@endsection