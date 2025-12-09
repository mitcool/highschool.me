@extends('admin_template')

@section('content')
<div class="container shadow mx-auto" style="padding:30px;margin-top:20px;">
		<form action="{{route('edit-academic')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="container" style="padding:30px;">
				<h3 class="text-center">Edit Academic</h3>	
				<div class="row">
					<div class="col-md-12 my-2">
						<label for="" class="font-weight-bold">Name</label>
						<input type="text" name="name" required class="form-control" value="{{$academic->name}}">
					</div>
					<div class="col-md-12 my-2">
						<label for="" class="font-weight-bold">Slug</label>
						<input type="text" name="slug" required class="form-control" value="{{$academic->slug}}">
					</div>
					<div class="col-md-12 my-2">
						<label for="" class="font-weight-bold">Description</label>
						<textarea rows="5"  name="description" required class="form-control">{{$academic->description}}</textarea>
					</div>
						
					<div class="col-md-12 text-center">
						<hr>
						<input type="hidden" name="id" value="{{$academic->id}}">
						<button class="btn btn-info">Edit Academic </button>
					</div>
				</div>
			</div>
		</form>
		<div class="col-md-8 offset-md-2 text-right my-2">
			<form action="{{route('delete-academic',$academic->id)}}" method="POST">
				{{csrf_field()}}
				<button class="btn btn-danger">Delete Academic</button>
			</form>
		</div>
@endsection