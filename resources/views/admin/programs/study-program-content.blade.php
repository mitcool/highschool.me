@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="7" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add Study Program Content </h2>
		<hr>
		<form method="POST" action="{{route('add-study-program-content')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text</label>
					<textarea name="text" id="" class="ckeditor" cols="30" rows="10">{!! $program->program_content ? $program->program_content->text : '' !!}</textarea>
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text (German)</label>
					<textarea name="text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->program_content ? $program->program_content->text_de : '' !!}</textarea>
				</div>
				<div class="col-md-12">
					<h4 class="text-center p-3">Accordion</h4>
				</div>
				<div class="col-md-6 text-center" id="accordion">
				<div id="accordion-form">
					@if(count($program->program_content_accordion) > 0)
					<div class="accordion-section">
						@foreach ($program->program_content_accordion as $accordion)
							<h5 class="font-italic text-success">Accordion section 1</h5>
							<label for="" class="font-weight-bold">Bold Headline</label>
							<input class="form-control" name="bold_headline[]" type="text" value="{{ $accordion->bold_headline }}"/>
							<label for="" class="font-weight-bold">Question part</label>
							<textarea name="accordion_headline[]" type="text" class="form-control">{!! $accordion->headline !!}</textarea>
							<label for="" class="font-weight-bold">Hidden part</label>
							<textarea name="accordion_content[]" id="1" cols="30" rows="10" class="ckeditor">{!! $accordion->content !!}</textarea>
						@endforeach
					</div>
					@else
					<div class="accordion-section">
						<h5 class="font-italic text-success">Accordion section 1</h5>
						<label for="" class="font-weight-bold">Bold Headline</label>
						<input class="form-control" name="bold_headline[]" type="text" value=""/>
						<label for="" class="font-weight-bold">Question part</label>
						<textarea name="accordion_headline[]" type="text" class="form-control"></textarea>
						<label for="" class="font-weight-bold">Hidden part</label>
						<textarea name="accordion_content[]" id="1" cols="30" rows="10" class="ckeditor"></textarea>
					</div>
					@endif
				</div>
				</div>
					<div class="col-md-6 text-center" id="accordion-de">
						<div id="accordion-form-de">
							@if(count($program->program_content_accordion) > 0)
							<div class="accordion-section">
								@foreach ($program->program_content_accordion as $accordion)
									<h5 class="font-italic text-success">Accordion section 1</h5>
									<label for="" class="font-weight-bold">Bold Headline</label>
						            <input class="form-control" name="bold_headline_de[]" type="text" value="{{ $accordion->bold_headline_de }}"/>
									<label for="" class="font-weight-bold">Visible part</label>
									<textarea name="accordion_headline_de[]" type="text" class="form-control">{!! $accordion->headline_de !!}</textarea>
									<label for="" class="font-weight-bold">Hidden part</label>
									<textarea name="accordion_content_de[]" id="1" cols="30" rows="10" class="ckeditor">{!! $accordion->content_de !!}</textarea>
								@endforeach
							</div>
							@else
							<div class="accordion-section">
								<h5 class="font-italic text-success">Accordion section 1</h5>
								<label for="" class="font-weight-bold">Bold Headline</label>
								<input class="form-control" name="bold_headline_de[]" type="text" value=""/>
								<label for="" class="font-weight-bold">Visible part</label>
								<textarea name="accordion_headline_de[]" type="text" class="form-control"></textarea>
								<label for="" class="font-weight-bold">Hidden part</label>
								<textarea name="accordion_content_de[]" id="1" cols="30" rows="10" class="ckeditor"></textarea>
							</div>
							@endif
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-danger mt-2" id="remove-section">- Remove accordion section</button>
						<button type="button" class="btn btn-dark mt-2" id="add-section">+ Add accordion section</button>
					</div>
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

@section('scripts')
<script>
	$(document).ready(function(){
		$('#add-section').on('click',function(){
			let section_count = $('.accordion-section').length;
			let id = Math.random(); // we need id for ckeditor
			$('#accordion-form').append(
				`<div class="accordion-section">
					<h5 class="font-italic text-success">Accordion section ${section_count}</h5>
					<label for="" class="font-weight-bold">Bold Headline</label>
					<input class="form-control" name="bold_headline[]" type="text" value=""/>
					<label for="" class="font-weight-bold">Visible part</label>
					<textarea name="accordion_headline[]" type="text" class="form-control"></textarea>
					<label for="" class="font-weight-bold">Hidden part</label>
					<textarea name="accordion_content[]" id="content_${section_count}" cols="30" rows="10" class="ckeditor"></textarea>
				</div>`
			);
			$('#accordion-form-de').append(
				`<div class="accordion-section-de">
					<h5 class="font-italic text-success">Accordion section ${section_count}</h5>
					<label for="" class="font-weight-bold">Bold Headline</label>
					<input class="form-control" name="bold_headline_de[]" type="text" value=""/>
					<label for="" class="font-weight-bold">Visible part</label>
					<textarea name="accordion_headline_de[]" type="text" class="form-control"></textarea>
					<label for="" class="font-weight-bold">Hidden part</label>
					<textarea name="accordion_content_de[]" id="content_de_${section_count}" cols="30" rows="10" class="ckeditor"></textarea>
				</div>`
			);
			CKEDITOR.replace(`content_de_${section_count}`);
			CKEDITOR.replace(`content_${section_count}`);
		});

		$("#remove-section").on('click',function(){
			let section_count = $('.accordion-section').length;
			if(section_count > 1){
				$('.accordion-section').last().remove();
				$('.accordion-section-de').last().remove();
			}
		});
	});
</script>
@endsection