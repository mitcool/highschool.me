@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="10" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Knowledge for success</h2>
		<hr>
		<form method="POST" action="{{route('add-knowledge-for-success')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
				        <label for="" class="font-weight-bold">Main Text</label>
						<textarea name="text" id="" class="ckeditor" cols="30" rows="10">{!! $program->knowledge_for_success ? $program->knowledge_for_success->text : old('text') !!}</textarea>
					
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text (German)</label>
					<textarea name="text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->knowledge_for_success ? $program->knowledge_for_success->text_de : old('text_de') !!}</textarea>
				</div>
				<div class="col-md-12 text-center">
					<br>
					<input type="hidden" name="program_id" value="{{ $program_id }}">
					<button type="submit" class="btn btn-info">Add Text</button>
				</div>
			</div>
	
		</form>
		</div>
</div>
@endsection
