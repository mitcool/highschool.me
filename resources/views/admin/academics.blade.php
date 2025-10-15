@extends('admin_template')

@section('content')
	<div class="container-fluid" style="margin-top:50px;">
		<form action="{{route('add-academic')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-2"></div>

				<div class="col-md-8 shadow" style="padding:30px;">
					<h3 class="text-center">Add Academic</h3>	
					<div class="row">
						
						@foreach (Config('languages') as $lang  => $language)
						<div class="col-md-12 my-2">
							<input type="text" name="title-{{ $lang }}" required class="form-control" placeholder="Title({{ $lang }})">
						</div>
						@endforeach
						
						@foreach (Config('languages') as $lang  => $language)
						<div class="col-md-12 my-2">
							<input type="text" name="name-{{ $lang }}" required class="form-control" placeholder="Name({{ $lang }})">
						</div>
						@endforeach
						
						@foreach (Config('languages') as $lang  => $language)
						<div class="col-md-12 my-2">
							<input type="text" name="slug-{{ $lang }}" required class="form-control" placeholder="Slug({{ $lang }})">
						</div>
						@endforeach

						@foreach (Config('languages') as $lang  => $language)
						<div class="col-md-12 my-2">
							<textarea  rows="5" name="description-{{ $lang }}" required class="form-control" placeholder="Description({{ $lang }})"></textarea>
						</div>
						@endforeach

						<div class="col-md-6 my-2">
							 <div class="custom-file">
						    <input type="file" name="picture" class="custom-file-input" id="avatar" required>
						    <label class="custom-file-label" for="avatar">Picture </label>
						  </div>
						  <span class="text-primary" style="font-size:14px"> *{{trans('messages.up-to-200')}} </span> 
						</div>
						<div class="col-md-12 text-center">
							<hr>
							<button class="btn btn-info">Add Academic</button>
						</div>
					</div>
					<hr>
					<h3 class="text-center">List with existing academics</h3>
					<ul class="list-group text-center">
						@foreach($academics as $academic)
							<a href="{{route('edit-single-academic',$academic->id)}}">
								<li class="list-group-item">{{$academic->translated->name}}</li>
							</a>
						@endforeach
					</ul>
				</div>
				<div class="col-md-2"></div>
			</div>
		</form>
	</div>
@endsection