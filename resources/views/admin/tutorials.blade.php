@extends('admin_template')


@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="p-3 container shadow bg-light">
	<h1 class="text-center">Add new tutorial video</h1>
	<form action="{{route('add-tutorial')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-12 my-2">
				<input type="checkbox" name="type" value="1" id="program_check"> Is a program tutorial?
			</div>
			<div class="col-md-12 my-2">
				@foreach(Config::get('languages') as $lang => $language)
					<input type="text" name="video_{{ $lang }}" class="form-control my-2" required placeholder="Link to video({{ $language }})">
				@endforeach
			</div>
			<div class="col-md-12 my-2">
				@foreach(Config::get('languages') as $lang => $language)
					<input type="text" name="name_{{ $lang }}" class="form-control my-2" required placeholder="Title of video({{ $language }})">
				@endforeach
			</div>
			<div class="col-md-12 my-2" id="Text">
				@foreach(Config::get('languages') as $lang => $language)
					<label for="">Text({{ $language }})</label>
					<textarea class="ckeditor" name="text_{{ $lang }}" class="form-control my-2" required placeholder=""></textarea>
				@endforeach
			</div>
			<div class="col-md-12 my-2" id="slug">
				@foreach(Config::get('languages') as $lang => $language)
					<input type="text" name="slug_{{ $lang }}" class="form-control my-2" required placeholder="Slug({{ $language }})">
				@endforeach
			</div>
			<div class="col-md-12 my-2 d-none" id="program">
				<select name="program" class="form-control">
					@foreach($programs as $program)
						<option value="{{ $program->id }}">{{ $program->translated->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-12 my-2">
				@foreach(Config::get('languages') as $lang => $language)
				<div class="input-group my-2">
				  <div class="custom-file m-0">
				    <input type="file" name="cover_{{ $lang }}" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required class>
				    <label class="custom-file-label" for="inputGroupFile04">Thumbnail of video({{ $language }}) {{trans('messages.up-to-200')}}</label>
				  </div>
				</div>
				@endforeach
			</div>
			
			<div class="col-md-12 my-2 text-center">
				<hr>
				<button class="btn btn-info">Add Video</button>
			</div>
		</div>
	</form>

	<hr>
	<h1 class="text-center">Existing tutorials</h1>
	@foreach($help_desk_tutorials as $tutorial)
	<div class="row shadow my-3 p-3">
		<div class="col-md-6 d-flex align-items-center">
			<h5 class="m-0 font-weight-bold">{{$tutorial->translated->name}}</h5>
		</div>
		<div class="col-md-6 text-right">
			<div class="d-flex justify-content-end">
				<a href="{{ route('edit-tutorial',$tutorial->id) }}" class="btn btn-secondary">Edit</a> &nbsp;
				<form action="{{route('delete-tutorial',$tutorial->id)}}" method="POST">
					{{csrf_field()}}
					<button class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
	@endforeach	

	@foreach($program_tutorials as $tutorial)
	<div class="row shadow my-3 p-3">
		<div class="col-md-6 d-flex align-items-center">
			<h5 class="m-0 font-weight-bold">{{$tutorial->translated->name}}</h5>
		</div>
		<div class="col-md-6 text-right">
			<div class="d-flex justify-content-end">
				<a href="{{ route('edit-tutorial',$tutorial->id) }}" class="btn btn-secondary">Edit</a> &nbsp;
				<form action="{{route('delete-tutorial',$tutorial->id)}}" method="POST">
					{{csrf_field()}}
					<button class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
	@endforeach	
</div>

@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('#program_check').on('click', function(){
			if($(this).is(':checked')){
				$('#slug').addClass('d-none')
				$('#slug').removeClass('d-block');
				$('#slug input').prop('required', false)
				$('#program').removeClass('d-none')
				$('#program').addClass('d-block');
			}
			else{
				$('#slug').addClass('d-block')
				$('#program').addClass('d-none')
				$('#slug').removeClass('d-none')
				$('#program').removeClass('d-block')
				$('#slug input').prop('required', true)
			}
		})
	})
</script>
@endsection