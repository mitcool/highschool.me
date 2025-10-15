@extends('admin_template')

@section('css')
<style>
    .section{
        margin-top:20px;
        padding:10px;
        border-top:2px solid rgb(77, 76, 74);
    }
    .selected-image{
        border:3px solid rgb(85, 146, 215) !important;
    }
</style>
@endsection

@section('content')
<div class="jumbotron container">

    <h2>{{ $job ? 'Edit job' : 'Create a job' }}</h2>
    <hr>
    <form action="{{ route('add-job') }}" method="POST" enctype="multipart/form-data" id="create_jobs_form">
        {{ csrf_field() }}
        <div class="row mt-1">
            {{-- Slug --}}
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Slug(EN)</label>
                <input type="text" name="slug" class="form-control" required value="{{ $job ? $job->slug  : old('slug') }}" />
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Slug(De)</label>
                <input type="text" name="slug_de" class="form-control" required value="{{ $job ? $job->slug_de  : old('slug_de') }}" />
            </div>
            {{-- Name --}}
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Job Title(DE)</label>
                <input type="text" name="name" class="form-control" required value="{{ $job ? $job->name  : old('name') }}" />
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Job Title(EN)</label>
                <input type="text" name="name_de" class="form-control" required value="{{ $job ? $job->name_de  : old('name_de') }}" />
            </div>
           {{-- Description --}}
			<div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Job description(EN)</label>
				<textarea  name="description" class="ckeditor" required >{!! $job ? $job->description  : old('description') !!}</textarea>
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Job description(DE)</label>
				<textarea  name="description_de" class="ckeditor" required >{!! $job ? $job->description_de  : old('description_de') !!}</textarea>
            </div>
            {{-- Meta Title --}}
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Meta title(EN)</label>
                <input type="text" name="meta_title" class="form-control" required value="{{ $job ? $job->meta_title  : old('meta_title') }}"/>
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Meta title(DE)</label>
                <input type="text" name="meta_title_de" class="form-control" required value="{{ $job ? $job->meta_title_de  : old('meta_title_de') }}"/>
            </div>
            
            {{-- Meta Description --}}
			<div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Meta description(EN)</label>
				<textarea  name="meta_description" class="form-control" required >{!! $job ? $job->meta_description  : old('meta_description') !!}</textarea>
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Meta description (DE)</label>
                <textarea name="meta_description_de" class="form-control" required >{!! $job ? $job->meta_description_de  : old('meta_description_de') !!}</textarea>
            </div>
            
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Category</label>
                <select name="category_id" id="" class="form-control" required>
                    <option value="" selected disabled>Please select category</option>
                    @foreach ($job_categories as $category )
                        <option @if($job) {{ $job->category_id == $category->id ? ' selected ' : '' }} @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>                
            </div>
            <div class="col-md-12 mt-3">
                <label for="" class="font-weight-bold mb-0">Cover</label>
                <input type="file" name="cover" />
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center my-2">
            <input name="id" type="hidden" value="{{ $job ? $job->id : '' }}">
            <button class="btn btn-info">{{ $job ? 'Edit Job'  : 'Publish Job' }} </button>
        </div>
    </form>
    <hr>
    <h4 class="text-center">Current Jobs:</h4><br>
    @foreach ($jobs as $j )
    <div class="row my-2">
        <div class="col-md-6">
            <h6>{{ $j->name }}</h6>
        </div>
        <div class="col-md-3">
            <a href="{{ route('edit-single-job',$j->id) }}" class="btn btn-warning">Edit Job</a>
        </div>
        <div class="col-md-3">
            <form action="{{ route('delete-job',$j->id) }}" method="Post">
                {{ csrf_field() }}
                <button class="btn btn-danger">Delete Job</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

  
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection