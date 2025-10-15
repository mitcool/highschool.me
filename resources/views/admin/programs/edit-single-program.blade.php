@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')

<div class="w-75 bg-light mx-auto p-2">

	<x-progress-bar step="1" />
	<div class="text-center pt-4">
		<h2>Edit program ({{ $program->translated->name }})</h2>
		<hr>
		<form method="POST" action="{{route('update-single-program')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
	
				@foreach($program->all_translations as $translation)
				<div class="col-lg-6 text-center">
					<div class="form-group">
                        <label  class="font-weight-bold">Name of the program({{ $translation->locale }}) (menu)</label>
                        <input type="text" class="form-control"  name="name_{{ $translation->locale }}" maxlength="190" value="{!! $translation->name !!}">
                    </div>
					<div class="form-group">
                        <label  class="font-weight-bold">Heading of the program({{ $translation->locale }}) (h1)</label>
                        <input type="text" class="form-control"  name="single_page_heading_{{ $translation->locale }}" maxlength="190" value="{!! $translation->single_page_heading !!}">
                    </div>
                    <div class="form-group">
                        <label for="text_bg" class="font-weight-bold">First Intro Text({{ $translation->locale }})</label>
                        <textarea class="form-control ckeditor"  name="text_{{ $translation->locale }}" rows="3">
                            {!! $translation->text !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label  class="font-weight-bold">Slug of the program({{ $translation->locale }})</label>
                        <input type="text" class="form-control"  name="slug_{{ $translation->locale }}" maxlength="190" value="{!! $translation->slug !!}">
                    </div>
                   
                        <div class="form-group">
                            <label for="meta_title_{{ $translation->locale }}" class="font-weight-bold">Meta title of the program({{ $translation->locale }})</label>
                            <textarea  class="form-control" name="meta_title_{{ $translation->locale }}">{!! $translation->meta_title !!}</textarea>
                        </div>
                   
                        <div class="form-group">
                            <label for="meta_description_{{ $translation->locale }}" class="font-weight-bold">Meta description of the program({{ $translation->locale }})</label>
                            <textarea class="form-control" name="meta_description_{{ $translation->locale }}">{!! $translation->meta_description !!}</textarea>
                        </div>
                    </div>
				@endforeach
			
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label for="tuition_fee"class="font-weight-bold" >Endrollment Fee (EUR)</label>
						<input type="number" class="form-control"  name="enrollment_fee" value="{{ $program->enrollment_fee }}">
					</div>
				</div>
				<div class="col-lg-6 text-center">
					<div class="form-group">
						<label for="half_tuition_fee" class="font-weight-bold" >Examination Fee (EUR)</label>
						<input type="number" class="form-control"  name="examination_fee" value="{{ $program->examination_fee }}">
					</div>
				</div>
				
			
			<div class="col-lg-6 text-center">
			
				<div class="form-group">
					<label for="study_id" class="font-weight-bold">Select study field</label>
					<select class="form-control" id="study_id" name="study_id" required>
						<option hidden>Select an option</option>
						@foreach($studies as $study)
							<option value="{{ $study->id }}" {{ $program->study_id == $study->id ? ' selected ' : ''  }}>{{ $study->key }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-12">
				<p class="text-primary">If you want to change the cover or square picture of the go to images section !!! </p>
			</div>
			
			<div class="col-lg-12 text-left">
				<div>
					<input type="checkbox" {{ $program->is_new == 1 ? ' checked ' : ''  }} name="is_new"> <span class="font-weight-bold">Is the program new?</span>
				</div> 
				<div>
					<input type="checkbox" {{ $program->fast_track == 1 ? ' checked ' : ''  }} name="fast_track"> <span class="font-weight-bold">Is it a FAST-TRACK program?</span>
				</div> 
			</div>
		</div>
		
			<div class="col-lg-3" style="margin: 50px auto;">
				<input type="hidden" name="program_id" value="{{ $program->id }}">
				<button type="submit" class="btn btn-info">Update Program  Now</button>
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