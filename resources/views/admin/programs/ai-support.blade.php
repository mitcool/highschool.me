@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="5" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add AI support text </h2>
		<hr>
		<form method="POST" action="{{route('add-ai-support')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
                    <label for="" class="font-weight-bold">Text (English)</label>
                    <textarea name="ai_support_text" id="" class="ckeditor" cols="30" rows="10">{!! $program->ai_support ? $program->ai_support->ai_support_text : old('ai_support_text') !!}</textarea>
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Text (German)</label>
					<textarea name="ai_support_text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->ai_support ? $program->ai_support->ai_support_text_de : old('ai_support_text_de') !!}</textarea>
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