@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="11" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Fiancing</h2>
		<hr>
		<form method="POST" action="{{route('add-financing')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
				        <label for="" class="font-weight-bold">Main Text</label>
						<textarea name="text" id="" class="ckeditor" cols="30" rows="10">{!! $program->financing ? $program->financing->text  : old('text') !!}</textarea>
					
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text (German)</label>
					<textarea name="text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->financing ? $program->financing->text_de : old('text_de') !!}</textarea>
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
			let section_count = $('.accordion-section').length + 1;
			let id = Math.random(); // we need id for ckeditor
			$('#accordion-form').append(
				`<div class="accordion-section">
					<h5 class="font-italic text-success">Accordion section ${section_count}</h5>
					<label for="" class="font-weight-bold">Visible part</label>
					<input name="accordion_headline[]" type="text" class="form-control">
					<label for="" class="font-weight-bold">Hidden part</label>
					<textarea name="accordion_content[]" cols="30" rows="10" class="ckeditor"></textarea>
				</div>`
			);
			CKEDITOR.replaceAll('ckeditor');
		});

		$("#remove-section").on('click',function(){
			let section_count = $('.accordion-section').length;
			if(section_count > 1){
				$('.accordion-section').last().remove();
			}
		});
	});
</script>
@endsection