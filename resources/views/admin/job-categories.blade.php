@extends('admin_template')

@section('content')
<div class="jumbotron container">

    <h2 class="text-center">Create job category</h2>
    <hr>
    <form action="{{ route('add-job-category') }}" method="POST" enctype="multipart/form-data" id="create_jobs_form">
        {{ csrf_field() }}
        <div class="row mt-1">
            {{-- Slug --}}
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Name(EN)</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Name(De)</label>
                <input type="text" name="name_de" class="form-control" required />
            </div>
            <div class="col-md-12 my-4 text-center">
                <button class="btn btn-info">Add category</button>
            </div>
        </div>
    </form>

    <h2 class="text-center">List of all categories</h2>
    @foreach ($job_categories as $category )
        <div class="row my-2">
            <div class="col-md-4">
                <input required form="edit-category-{{ $category->id }}" type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>
            <div class="col-md-4">
                <input required form="edit-category-{{ $category->id }}" type="text" name="name_de" class="form-control" value="{{ $category->name_de }}">
            </div>
            <div class="col-md-2 text-center">
                <form action="{{ route('edit-job-category',$category->id) }}" id="edit-category-{{ $category->id }}" method="POST">
                    <button class="btn btn-warning">Update category</button>
                </form>
            </div>
            <div class="col-md-2 text-right">
                <form action="{{ route('delete-job-category',$category->id) }}" method="POST" class="confirm-first" id="delete-category-{{ $category->id }}">
                    <button class="btn btn-danger">Delete category</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection