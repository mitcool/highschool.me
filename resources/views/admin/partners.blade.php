@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection
	
@section('content')
<div class="container" style="margin-top:40px;">
	<form method="POST" action="{{route('upload-partner')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Add partner</h2>
			</div>
			<div class="col-md-6 my-2 offset-md-3">
				<div class="custom-file">
				    <input type="file" name="picture" class="custom-file-input" id="avatar" required>
				    <label class="custom-file-label" for="avatar">Picture</label>
				  </div>
			</div>
			@foreach(Config('languages') as $lang => $language)
			<div class="col-md-6 my-2">
				<label class="font-weight-bold" for="">Name ({{ $lang }})</label>
				<textarea  name="name_{{ $lang }}" class="form-control" required placeholder=""></textarea>
			</div>
			@endforeach
			@foreach(Config('languages') as $lang => $language)
			<div class="col-md-6 my-2">
				<label class="font-weight-bold" for="">Text ({{ $lang }})</label>
				<textarea  name="text_{{ $lang }}" class="ckeditor" required placeholder="Text ({{ $lang }})"></textarea>
			</div>
			@endforeach
			<div class="col-md-12 text-center">
				<hr>
				<div class="custom-file">
				    <input type="submit" class="btn btn-info" value="Add Partner" required>
				  </div>
			</div>
		</div>
	</form>
	<hr>
	<h2 class="text-center">Edit partner</h2>
	<div class="row">
		@foreach($partners as $partner)
			<div class="col-md-12 my-2 shadow">
				<div class="text-center p-1">
					<form method="POST" action="{{route('edit-partner',$partner->id)}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-4 offset-md-4">
								<x-image-component nickname="partner-{{ $partner->id }}" class="w-100" />
							</div>
							@foreach($partner->all_translations as $translation)
							<div class="col-md-6 my-2">
								<input name="name_{{ $translation->locale }}" class="form-control" value="{{ $translation->name }}" required>
							</div>
							@endforeach
							@foreach($partner->all_translations as $translation)
							<div class="col-md-6 my-2">
								<textarea rows="10" name="text_{{ $translation->locale }}" class="ckeditor" required>{{ $translation->text }}</textarea>
							</div>
							@endforeach
							<div class="col-md-12 text-center">
								<hr>
								<div class="custom-file">
									<input type="submit" class="btn btn-info" value="Edit Partner" required>
								  </div>
							</div>
						</div>
					</form>
				</div>
			</div>
		@endforeach	
	</div>
	<hr>
	<h2 class="text-center">Delete partner</h2>
	<div class="row">
		@foreach($partners as $partner)
			<div class="col-md-3 my-2">
				<div class="shadow border text-center p-1">
					<x-image-component nickname="partner-{{ $partner->id }}" class="w-100" />
					<hr>
					<form action="{{route('delete-partner',$partner->id)}}" method="POST">
						{{csrf_field()}}
						<button class="btn btn-danger">Delete Partner</button>
					</form>
				</div>
			</div>
		@endforeach	
	</div>
</div>

@endsection