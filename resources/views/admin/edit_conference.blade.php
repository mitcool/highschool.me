@extends('admin_template')

@section('content')
<div class="container-fluid texts_container">
	<form id="edit_conference_form" method="POST" action="{{route('edit-conference-post', $conference->id)}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Edit Conference</h1>
			</div>
			
			<div class="col-lg-12 mt-5">
				<h3>Info</h3>
				<div class="mt-3">
					<label>Start Date</label>
					<input class="input-text form-control" type="text" name="date_from" value="{{$conference->date_from}}" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>End Date</label>
					<input class="input-text form-control" type="text" name="date_to" value="{{$conference->date_to}}" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>Deadline</label>
					<input class="input-text form-control" type="text" name="application_deadline" value="{{$conference->application_deadline}}" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>Places</label>
					<input class="input-text form-control" type="text" name="places" value="{{$conference->places}}" required>
				</div>
			</div>
			<div class="col-lg-12 mt-5">
				<h3>Texts</h3>
				@foreach($conference->all_translations as $c)
					<br><hr>
					<div class="form-group">
						<label class="font-weight-bold">Heading {{$c->locale}}</label>
						<input class="input-text form-control" type="text" name="heading_{{$c->locale}}" value="{{$c->heading}}" required>
					</div>
			
					<div class="form-group">
						<label class="font-weight-bold">Long description {{$c->locale}}</label>
						<textarea class="input-text form-control" type="text" name="long_description_{{$c->locale}}" required> {{$c->long_description}}</textarea>
					</div>
		
					<div class="form-group">
						<label class="font-weight-bold">Short description {{$c->locale}}</label>
						<textarea class="input-text form-control" type="text" name="short_description_{{$c->locale}}" value="" required>{{$c->short_description}}</textarea>
					</div>

					<div class="form-group">
						<label class="font-weight-bold">Slug {{$c->locale}}</label>
						<input class="input-text form-control" type="text" name="slug_{{$c->locale}}" value="{{$c->slug}}" required>
					</div>
				@endforeach
				
			</div>
			<div class="col-lg-12 text-right mt-5" style="padding-bottom:150px;">
				<button type="submit" class="btn publish-btn" style="background-color: lightgrey" name="publish">Publish</button>
				
				<a href="{{route('all-conferences')}}" class="btn cancel-btn" style="background-color: lightgrey">Cancel</a>
			</div>
		</div>
	</form>
	<form action="{{ route('delete-conference',$conference->id) }}" method="POST">
		{{ csrf_field() }}
		<button type="submit" class="btn mx-4 delete-btn" style="background-color: lightgrey" name="delete">Delete</button>
	</form>
</div>
@endsection

@section('footerScripts')
<script>
$(document).ready(function() {
	let image = '';
	CKEDITOR.replace('text_en');
	CKEDITOR.replace('text_de');
	CKEDITOR.replace('text_bg');
	$('#image').on('change', function() {
		image = $('#image').val();
		if(image) {
			$('.img-name').text(image.substring(12));
		}	
		else {
			$('.img-name').text('');
		}
	});
	$('#edit_conference_form').submit(function(e) {
		image = $('.img-name').text();
		let text_en_text = CKEDITOR.instances.text_en.getData();
		let text_de_text = CKEDITOR.instances.text_de.getData();
		let text_bg_text = CKEDITOR.instances.text_bg.getData();
		if(image == "") {
			alert('Conference image is required.');
			e.preventDefault();
		}
		else if(!$('textarea[name="description_en"]').val() || !$('textarea[name="description_de"]').val() || !$('textarea[name="description_bg"]').val()) {
			alert('Conference descriptions are required.');
			e.preventDefault();
		}
		else if(!text_en_text || !text_de_text || !text_bg_text) {
			alert('Conference text fields are required.');
			e.preventDefault();
		}	
	});
	$('.delete-img').on('click', function() {
		if(confirm('Are you sure you want to delete the conference image?')) {
			id = $(this).attr('data-id');
			$.ajax({
				data: {id},
				method: "POST",
				url: "/admin-dashboard/delete-conference-image",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).done(function(result) {
				if(result == 1) {
					location.reload();
				}
			})
		}
	});
});
</script>
@endsection