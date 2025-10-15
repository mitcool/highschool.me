@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="9" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add Required Documents </h2>
		<hr>
		<form method="POST" action="{{route('add-required-documents')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
				        <label for="" class="font-weight-bold">Main Text</label>
						<textarea name="text" id="" class="ckeditor" cols="30" rows="10">{!! $program->required_documents ? $program->required_documents->text : old('text') !!}</textarea>
					
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text (German)</label>
					<textarea name="text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->required_documents ? $program->required_documents->text_de : old('text_de') !!}</textarea>
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

{{-- <div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Video</h4>
					</div>
					<div class="col-lg-6 text-center">
						<div class="form-group">
							<label class="font-weight-bold">Youtube link to main video </label>
							<input type="text" class="form-control" name="video" maxlength="190" required>
						</div>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">General Benefits</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">AI support info</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Facts</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Study program btn-info																																																																																																																																										</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Study requirements</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Required documents</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Tuition Fees</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Financing</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Career paths</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Where MBA Graduates Successfully Launch Their Careers</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Testimonial Video</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Set your knowledge</h4>
					</div> --}}