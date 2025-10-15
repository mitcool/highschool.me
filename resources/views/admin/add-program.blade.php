@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="1" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add program</h2>
		<hr>
		<form method="POST" action="{{route('add-program-form')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
	
				@foreach(Config::get('languages') as $lang => $language)
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label for="name_{{ $language }}" class="font-weight-bold">Name of the program({{ $language }}) (menu)</label>
						<input type="text" class="form-control" id="name_{{ $language }}" name="name_{{ $lang }}" maxlength="190">
					</div>
				</div>
				@endforeach
				@foreach(Config::get('languages') as $lang => $language)
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label  class="font-weight-bold">Heading of the program({{ $language }}) (h1)</label>
						<input type="text" class="form-control"  name="single_page_heading_{{ $lang }}" maxlength="190">
					</div>
				</div>
				@endforeach
					@foreach(Config::get('languages') as $lang => $language)
					<div class="col-lg-6 text-center">
						<div class="form-group">
							<label for="text_bg" class="font-weight-bold">First Intro Text({{ $language }})</label>
							<textarea class="form-control ckeditor"  name="text_{{ $lang }}" rows="3"></textarea>
						</div>
					</div>
					@endforeach
					
					@foreach(Config::get('languages') as $lang => $language)
					<div class="col-lg-6 text-center">
						<div class="form-group">
							<label  class="font-weight-bold">Slug of the program({{ $language }})</label>
							<input type="text" class="form-control"  name="slug_{{ $lang }}" maxlength="190">
						</div>
					</div>
				    @endforeach
					
					@foreach(Config::get('languages') as $lang => $language)
					<div class="col-lg-6 text-center"><div class="form-group">
						<label for="meta_title_{{ $language }}" class="font-weight-bold">Meta title of the program({{ $language }})</label>
						<textarea  class="form-control" name="meta_title_{{ $lang }}"></textarea>
					</div></div>
					@endforeach
					@foreach(Config::get('languages') as $lang => $language)
					<div class="col-lg-6 text-center"><div class="form-group">
						<label for="meta_description_{{ $language }}" class="font-weight-bold">Meta description of the program({{ $language }})</label>
						<textarea class="form-control" name="meta_description_{{ $lang }}"></textarea>
					</div></div>
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label for="tuition_fee"class="font-weight-bold" >Endrollment Fee (EUR)</label>
						<input type="number" class="form-control"  name="enrollment_fee">
					</div>
				</div>
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label for="half_tuition_fee" class="font-weight-bold" >Examination Fee (EUR)</label>
						<input type="number" class="form-control"  name="examination_fee">
					</div>
				</div>
				
			<div class="col-lg-6 text-center">
			
				<div class="form-group">
					<label for="study_id" class="font-weight-bold">Select study field</label>
					<select class="form-control" id="study_id" name="study_id" required>
						<option hidden>Select an option</option>
						@foreach($studies as $study)
							<option value="{{ $study->id }}">{{ $study->key }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6"></div>
			<div class="col-lg-6 text-center">
				<label for="study_id" class="font-weight-bold">Cover image (top of the page)</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="cover" name="cover" accept="image/*">
					<label class="custom-file-label" for="picture">Choose cover {{trans('messages.up-to-200')}}</label>
				</div>
			</div>
			<div class="col-lg-6 text-center">
				<label for="study_id" class="font-weight-bold">Square image (for studies pages)</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="picture" name="picture" accept="image/*">
					<label class="custom-file-label" for="picture">Choose square picture {{trans('messages.up-to-200')}}</label>
				</div>
			</div>
			
			<div class="col-lg-12 text-left">
				<div>
					<input type="checkbox" name="is_new"> <span class="font-weight-bold">Is the program new?</span>
				</div> 
				<div>
					<input type="checkbox" name="fast_track"> <span class="font-weight-bold">Is it a FAST-TRACK program?</span>
				</div> 
			</div>
		</div>
		
			<div class="col-lg-3" style="margin: 50px auto;">
				<button type="submit" class="btn btn-info">Add Now</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('footerScripts')
<script type="text/javascript">
	$(document).ready(function() {
		CKEDITOR.replace('text_en');
		CKEDITOR.replace('text_de');
		CKEDITOR.replace('text_bg');
	});
</script>
@endsection