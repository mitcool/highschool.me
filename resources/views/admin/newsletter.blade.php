@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container mb-3 bg-light p-3 shadow">
	<h2 class="text-center page-headings">Send newsletter</h2>
	<hr>
	<p class="text-right"><span class="text-danger ">* </span>Required fields</p>
	<p class="text-right"><span class="text-danger ">All images must be with 468 pixels Width and 60 pixels Height</p>
	<form id="subscribe_form" method="POST" action="{{ route('record-newsletter') }}" enctype="multipart/form-data" class="p-3">
		{{ csrf_field() }}
		<div class="row">
			
			<div class="col-md-12">
				<label class="font-weight-bold">Sender<span class="text-danger">*</span></label>
				<input type="text" value="{{ old('sender') }}" name="sender" class="form-control" required>
			</div>

			{{-- Subjects --}}
			<div class="col-md-12">
				<label class="font-weight-bold">Subject of newsletter(English)<span class="text-danger">*</span></label>
				<input type="text" value="{{ old('subject') }}" name="subject" class="form-control" required>
			</div>
			
			
			<div class="col-md-12">
				<label class="font-weight-bold">Cover Image<span class="text-danger">*</span></label>
				<div class="input-group mb-3">
				  
				  <div class="custom-file">
				    <input type="file" name="cover_image" class="custom-file-input commersial-files" id="cover_image" required>
				    <label class="custom-file-label" for="cover_image">Choose file (max 1mb)</label>
				  </div>
				</div>
			</div>

			@for($i=0;$i<6;$i++)
				<div class="row section-wrapper {{ $i!=0 ? ' d-none ' : ' d-flex ' }}">
					<div class="col-md-12">
						<hr>
						<h2>Newsletter section {{ $i+1 }}</h2>
					</div>
					<div class="col-md-12">
						<label class="font-weight-bold">Section text(EN) ({{ $i+1 }}) <span class="text-danger">*</span></label>
						<textarea  id="content-{{ $i }}" name="contents[]"  class="form-control ckeditor content">{!! (old('contents') && array_key_exists($i,old('contents'))) ? old('contents')[$i] : '' !!}</textarea>
					</div>
					
					<div class="col-md-12">
						<label class="font-weight-bold">Advertisement ({{ $i+1 }}) image</label>
						<div class="input-group mb-3">
						
						<div class="custom-file">
							<input type="file" required name="images[]" class="custom-file-input commersial-files" id="commersial_two" >
							<label class="custom-file-label" for="commersial_two">Choose file (max 1mb)<span class="text-danger">*</span></label>
						</div>
						</div>
					</div>
					<div  class="col-md-12">
						<label class="font-weight-bold">Advertisement ({{ $i+1 }}) URL <span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<input type="text" name="links[]" {!! (old('links') && array_key_exists($i,old('links'))) ? old('links')[$i] : '' !!} id="commersial_two_link" class="form-control commersial-link" required>
						</div>
					</div>
				</div>
			@endfor
			<div class="text-right col-md-12">
				<button class="btn-danger text-white btn" type="button" id="remove-section">
					Remove section
				</button>
				<button class="btn-dark text-white btn" type="button" id="add-section">
					Add section
				</button>
			</div>
			<div class="col-md-12">
				<label class="font-weight-bold" for="">Email greeting English(optional)</label>
				<textarea name="greeting_en" class="ckeditor" id="greeting_en"></textarea>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold" for="">Country Group</label>
				<select name="" id="" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
			<div class="col-md-6">
				<label class="font-weight-bold" for="">Language</label>
				<select name="" id="" class="form-control">
					<option value="1">English</option>
					<option value="2">Spanish</option>
					<option value="3">German</option>
					<option value="4">French</option>
				</select>
			</div>
			<div class="col-md-12 text-center mt-2">
				<button type="submit" class="btn btn-dark">Send newsletter</button>
			</div>
		</div>
	</form>
</div>

@endsection

@section('scripts')
	<script>
		$(document).ready(function(e) {
			$('.commersial-files').on('change',function(evt){
				let label = $(this).closest('.custom-file').find('.custom-file-label')	
				if($(this).val()==''){
					label.html('Choose file (max 1mb)').css('color','#000000');
				}
				else{
					let  filename =  $(this).val().replace(/^.*(\\|\/|\:)/, '');
					let label = $(this).closest('.custom-file').find('.custom-file-label')
					label.css('color','#26BA99').html('<i class="fas fa-check-circle"></i>&nbsp;' + filename);
				}
			});

			$('#add-section').on('click',function(){
				$('.section-wrapper.d-none').first().removeClass('d-none').addClass('d-flex');
			});

			$('#remove-section').on('click',function(){
				if($('.section-wrapper.d-flex').length > 1){
					$('.section-wrapper.d-flex').last().removeClass('d-flex').addClass('d-none');
				}
				else{
					alert('There are must be at least one section');
				}
			});
		});
	</script>
@endsection