@extends('admin_template')

@section('content')
	<div class="container-fluid" style="margin-top:50px;">
		<form action="{{route('edit-academic')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-2"></div>

				<div class="col-md-8 shadow" style="padding:30px;">
					<h3 class="text-center">Edit Academic</h3>	
					<div class="row">
						@foreach($academic->all_translations as $translation)
							<h3 class="text-capitalize">Translation {{ $translation->locale }}</h3>
							
							<div class="col-md-12 my-2">
								<label for="" class="font-weight-bold">Name({{ $translation->locale }})</label>
								<input type="text" name="name-{{ $translation->locale }}" required class="form-control" value="{{$translation->name}}">
							</div>
							
							<div class="col-md-12 my-2">
								<label for="" class="font-weight-bold">Description({{ $translation->locale }})</label>
								<textarea rows="5"  name="description-{{ $translation->locale }}" required class="form-control">{{$translation->description}}</textarea>
								<hr />
							</div>
								
						@endforeach

						<div class="col-md-12 text-center">
							<hr>
							<input type="hidden" name="id" value="{{$academic->id}}">
							<button class="btn btn-info">Edit Academic </button>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</form>
		<div class="col-md-8 offset-md-2 text-right my-2">
			<form action="{{route('delete-academic',$academic->id)}}" method="POST">
				{{csrf_field()}}
				<button class="btn btn-danger">Delete Academic</button>
			</form>
		</div>
	</div>
@endsection