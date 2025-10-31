@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')

<div class="jumbotron container">
    <h2 class="text-center">Add Feature</h2>
    <p class="text-danger">* For showing icon in public page please write "Yes" or "No" for plans value</p>
    <form action="{{ route('feature.add') }}" method="POST">
        {{ csrf_field() }}
        <label for="" class="mb-0 font-weight-bold">Feature Name</label>
        <input type="text" name="feature" class="form-control my-2" required>
        <label for="" class="mb-0 font-weight-bold">Core Plan</label>
        <input type="text" name="core" class="form-control my-2" required>
         <label for="" class="mb-0 font-weight-bold">Pro Plan</label>
        <input type="text" name="pro" class="form-control my-2" required>
        <label for="" class="mb-0 font-weight-bold">Elite Plan</label>
        <input type="text" name="elite" class="form-control my-2" required>
        <label for="" class="mb-0 font-weight-bold">Core Tootltip(optional)</label>
        <textarea class="ckeditor" name="core_tooltip" id="" cols="30" rows="10"></textarea>
        <label for="" class="mb-0 font-weight-bold">Pro Tootltip(optional)</label>
        <textarea class="ckeditor" name="pro_tooltip" id="" cols="30" rows="10"></textarea>
        <label for="" class="mb-0 font-weight-bold">Elite Tootltip(optional)</label>
        <textarea class="ckeditor" name="elite_tooltip" id="" cols="30" rows="10"></textarea>
        <label for="" class="mb-0 font-weight-bold">Category</label>
        <select name="category_id" id="" class="form-control my-2" required>
            <option value="" disabled selected>Please select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="text-center">
            <button class="btn my-2 btn-info" >Add feature</button>
        </div>  
    </form>
    <hr>
    <ul class="list-group">
        <h2 class="text-center">Current Features</h2>
        @foreach ($features as $feature )
             <li class="list-group-item d-flex w-100 align-center justify-content-between">{{ $feature->feature }}
                <div class="d-flex">
                    <a class="btn btn-warning m-0" href="{{ route('feature.edit',$feature->id) }}">Edit Feature</a> &nbsp;
                    <form class="m-0 text-right" action="{{ route('feature.delete',$feature->id) }}" method="POST">
                        <button class="btn btn-danger m-0" >Delete feature</button> 
                    </form>
                </div>
            </li>
        @endforeach
       
    </ul>
</div>


@endsection