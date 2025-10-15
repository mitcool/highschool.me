@extends('admin_template')

@section('content')

<div class="container my-3 p-3">
	<h3 class="text-center">Change a slide image here</h3>
	<div class="row">
		@foreach($slides as $slide)
			<div class="col-md-4 my-2 text-center">
				<img src="/images/slider-images/{{$slide->picture}}" class="w-100 shadow">
				<form action="{{route('delete-slide',$slide->id)}}" method="POST">
					{{csrf_field()}}
					<button class="btn btn-danger mt-3">Delete Slide</button>
					<hr>
				</form>
			</div>
		@endforeach
	</div>
	<br>
	<h3 class="text-center">Add new slide</h3>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="{{route('add-new-slide')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="custom-file">
				    <input type="file"name="picture" class="custom-file-input" id="picture" required>
				    <label class="custom-file-label" for="picture">Desktop Picture.</label>
				  </div>
				  <hr>
				  <div class="custom-file">
				    <input type="file" name="mobile_picture" class="custom-file-input" id="mobile" required>
				    <label class="custom-file-label" for="mobile">Mobile Picture</label>
				  </div>
				   <hr>
				  <input type="text" name="go_to_slug" class="form-control" placeholder="Redirect Url(for button on the slider" required>
				  <hr>
				  <button class="btn btn-success btn-block">Add New Slide</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
@endsection