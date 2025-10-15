@extends('admin_template')

@section('css')
	<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="4" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add ISO section content</h2>
		<hr>
		<form method="POST" action="{{route('iso-certificate-text')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Iso text description (English)</label>
					<textarea name="iso_text" id="" class="ckeditor" cols="30" rows="10">{!! $program->iso ? $program->iso->iso_text  : old('iso_text') !!}</textarea>
					
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Iso text description (German)</label>
					<textarea name="iso_text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->iso ? $program->iso->iso_text_de : old('iso_text_de') !!}</textarea>
				</div>
				<div class="col-md-12 text-center">
					<br>
					<input type="hidden" name="program_id" value="{{ $program_id }}">
					<button type="submit" class="btn btn-info">Add Text</button>
				</div>
			</div>
	
		</form>
		<hr>
		<h2>ISO Icons</h2>
		<div class="row">
			<div class="col-md-12">
				<h5>Current Icons</h5>
			</div>
			@foreach($iso_icons as $icon)
				<div class="col-md-2">
					<img src="{{ asset('images/iso') }}/{{ $icon->icon }}" alt="" class="shadow w-100">
					<form method="POST" action="{{ route('delete-iso-icon',$icon->id) }}" class="confirm-first" id="delete-icon-{{ $icon->id }}">
						{{ csrf_field() }}
						<br>
						<button class="btn btn-danger">Delete Icon</button>
					</form>
				</div>
			@endforeach
			<div class="col-md-12">
				<hr>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h5>Add Icon</h5>
			</div>
			<form action="{{ route('add-iso-icon') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="" class="font-weight-bold">Text below icon (English)</label>
				<input type="text" name="text" class="form-control" required> <hr>
				<label for="" class="font-weight-bold">Text below icon (German)</label>
				<input type="text" name="text_de" class="form-control" required> <hr>
				<label for="" class="font-weight-bold">Link (English)</label>
				<input type="text" name="link" class="form-control" required> <hr>
				<label for="" class="font-weight-bold">Link (German)</label>
				<input type="text" name="link_de" class="form-control" required> <hr>
				<label for="" class="font-weight-bold">Iso text description (English)</label>
				<input type="file" name="icon" class="form-control" required> <hr>
				<button class="btn btn-info">Add Icon</button>
			</form>
		</div>
		<p>*The icons for ISO certification are common for every program and you can manage them from "ISO Icons" section</p>
	</div>
</div>
@endsection