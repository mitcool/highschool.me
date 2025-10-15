@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container">
	<form id="edit_publication_form" method="POST" action="{{route('edit-publication-post', $publication->id)}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Edit Publication</h1>
			</div>
			<div class="col-lg-12 mt-5">
		
				{{-- Pages --}}
				<label class="font-weight-bold m-0">Pages</label>
				<input class="publications input-text form-control" type="text" name="pages" value="{{$publication->pages}}" required>
				{{-- Edition --}}
				<label class="font-weight-bold m-0">Edition</label>
				<input class="publications input-text form-control" type="text" name="edition" value="{{$publication->edition}}" required>
				{{-- Year --}}
				<label class="font-weight-bold m-0">Year</label>
				<input class="publications input-text form-control" type="text" name="year" value="{{$publication->year}}" required>
				
				@foreach ($publication->all_translations as $translation)
					{{-- Heading --}}
					<label class="font-weight-bold m-0">Heading ({{ $translation->locale }})</label>
					<input class="publications input-text form-control" type="text" name="heading_{{ $translation->locale }}" value="{{$translation->heading}}" required>
					
					{{-- Summary --}}				
					<label class="font-weight-bold m-0">Summary ({{ $translation->locale }})</label>
					<textarea class="ckeditor" name="summary_{{ $translation->locale }}" required>{{$translation->summary}}</textarea>
					
					{{-- Authors --}}				
					<label class="font-weight-bold m-0">Authors ({{ $translation->locale }})</label>
					<textarea class="ckeditor"  name="authors_{{ $translation->locale }}"  required>{{$translation->authors}}</textarea>
					
					{{-- ISBN --}}
					<label class="font-weight-bold m-0">ISBN ({{ $translation->locale }})</label>
					<input class="publications input-text form-control" type="text" name="isbn_{{ $translation->locale }}" value="{{$translation->ISBN}}" required>
					
					{{-- Language --}}
					<label class="font-weight-bold m-0">Language ({{ $translation->locale }})</label>
					<input class="publications input-text form-control" type="text" name="language_{{ $translation->locale }}" value="{{$translation->language}}" required>
					
					<label class="font-weight-bold m-0">Slug ({{ $translation->locale }})</label>
					<input type="hidden" name="old_slug_{{ $translation->locale }}" value="{{$translation->slug}}">
					<input class="publications input-text form-control" type="text" name="slug_{{ $translation->locale }}" value="{{$translation->slug}}" required>
				@endforeach
			</div>
		
			<div class="col-lg-12 text-right mt-5">
				<button type="submit" class="btn btn-success" name="publish">Publish</button>
				
				<a href="{{route('all-publications')}}" class="btn btn-secondary">Cancel</a>
			</div>
		</div>
	</form>
	<form action="{{ route('delete-publication',$publication->id) }}" method="POST" class="text-right">	
		{{ csrf_field() }}
		<button type="submit" class="btn my-4 btn-danger" name="delete">Delete</button>
	</form>
</div>
@endsection

