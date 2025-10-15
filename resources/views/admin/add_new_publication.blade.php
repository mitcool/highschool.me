@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="texts_container mx-auto shadow">
	<form id="add_publication_form" method="POST" action="{{route('publish-new-publication')}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Add New Publication</h1>
			</div>
			<div class="col-lg-12 mt-5">
				<h3>Media</h3>
				<div class="mt-3">
					<label class="btn btn-secondary add-img-btn" for="image">Add Image</label>
					<span class="img-name"></span>
					<input id="image" type="file" required name="picture" accept="image/*">
					<br><span class="text-primary" style="font-size:14px;">{{trans('messages.up-to-200')}}</span>
					<hr> 
					<label class="mb-0 font-weight-bold">Pages</label>
					<input class="publications input-text form-control" type="number" name="pages" min="1" required>
					<label class="mb-0 font-weight-bold">Edition</label>
					<input class="publications input-text form-control" type="number" name="edition" required>
					<label class="mb-0 font-weight-bold">Year</label>
					<input class="publications input-text form-control" type="number" name="year" min="1950" required>
					
				</div>
				<div class="mt-5">
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">ISBN({{ $lang }})</label>
						<input class="publications input-text form-control" type="text" name="isbn_{{ $lang }}" required>
					@endforeach		
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">Heading({{ $lang }})</label>
						<input class="publications input-text form-control" type="text" name="heading_{{ $lang }}" required>
					@endforeach	
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">Slug({{ $lang }})</label>
						<input class="publications input-text form-control" type="text" name="slug_{{ $lang }}" required>
					@endforeach	
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">Language({{ $lang }})</label>
						<input class="publications input-text form-control" type="text" name="language_{{ $lang }}" required>
					@endforeach				
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">Summary({{ $lang }})</label>
						<textarea class="ckeditor" id="text_{{ $lang }}" name="summary_{{ $lang }}"></textarea>
					@endforeach
					@foreach (Config('languages') as $lang => $language)
						<label class="mb-0 font-weight-bold">Authors({{ $lang }})</label>
						<textarea class="ckeditor" id="authors_{{ $lang }}" name="authors_{{ $lang }}"></textarea>
					@endforeach		
				</div>
			</div>
		
			<div class="col-lg-12 text-right my-5">
				<button type="submit" class="btn btn-secondary">Publish</button>
			</div>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
	let image = '';
	CKEDITOR.replace('text_en');
	$('#image').on('change', function() {
		image = $('#image').val();
		if(image) {
			$('.img-name').text(image.substring(12));
		}
		else {
			$('.img-name').text('');
		}	
	});
	
	$('.add-author').on('click', function() {
		let input_authors = "<input class='publications input-text form-control mt-3' type='text' name='authors[]' required>";
		if($("input[name='authors[]']").length < 8) {
			$(input_authors).insertAfter($(this).prev());
			if($("input[name='authors[]']").length > 0) {
				$('.remove-author').prop('disabled', false);
			}
			else {
				$('.remove-author').prop('disabled', true);
			}
		}
		else if($("input[name='authors[]']").length >= 8) {
			alert("You have reached the maximum amount of users (8).");
		}
	});
	$('.remove-author').on('click', function() {
		$($(this).prev().prev()).remove();
		if($("input[name='authors[]']").length == 1) {
			$('.remove-author').prop('disabled', true);
		}
		else {
			$('.remove-author').prop('disabled', false);
		}
	});
});
</script>
@endsection