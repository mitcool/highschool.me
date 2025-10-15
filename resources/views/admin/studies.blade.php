@extends('admin_template')


@section('css')
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container bg-light" style="margin-top:40px;">
	<h2 class="text-center">Studies</h2>

	@foreach($studies as $study)
        @foreach($study->all_translations as $translation)
            <h4 class="text-secondary">{{ $study->key }} ({{$translation->locale}})</h4>
            <form action="{{ route('edit-study',$translation->id) }}" method="POST" class="my-3">
                {{ csrf_field() }}
                <label class="font-weight-bold m-0">Name ({{ $translation->locale }})</label>
                <input required name="name" type="text" value="{{ $translation->name }}" class="form-control my-2"/>
				
                <label class="font-weight-bold m-0"l>Slug ({{ $translation->locale }})</label>
                <input required name="slug" type="text" value="{{ $translation->slug }}" class="form-control my-2"/>
				
                <label class="font-weight-bold m-0">Heading ({{ $translation->locale }})</label>
                <input required name="heading" type="text" value="{{ $translation->heading }}" class="form-control my-2"/>
				
                <label class="font-weight-bold m-0">Description ({{ $translation->locale }})</label>
                <textarea required name="description" id="ckeditor-{{ $translation->id }}" class="ckeditor"> {{ $translation->description }} </textarea>
				
				 <label class="font-weight-bold m-0">Meta title ({{ $translation->locale }})</label>
                <textarea required name="meta_title" class="form-control"> {{ $translation->meta_title }} </textarea>
				
                <label class="font-weight-bold m-0">Meta description ({{ $translation->locale }})</label>
                <textarea required name="meta_description" class="form-control">{{ $translation->meta_description }} </textarea>
				
                <div class="text-center">
                    <button class="mx-auto btn btn-secondary my-2">Save</button>
                </div>
                <hr>
            </form>
        @endforeach
    @endforeach
</div>

@endsection

