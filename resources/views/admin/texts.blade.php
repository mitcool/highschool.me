@extends('admin_template')

@section('content')

<div class="shadow container wrapper">    
	<div class="row">
		<div class="col-md-12 text-center">
			<h2 class="page-headings">Please select a page for edit</h2>
			<hr>
		</div>
		@foreach($pages as $page)
			
			<div class="col-md-12 my-2">
				{{-- <iframe src="{{ route($page->getName()) }}" frameborder="0" width="100%" style="min-height:400px;"></iframe> --}}
				<a style="background:#045397; color:white;font-size:1.1rem;padding:10px;" href="{{route('single-text',$page->getName())}}" class="btn d-block text-center">  {{route($page->getName())}}</a>
			</div>
			<div class="col-md-12">
				{{-- <hr style="border-top: 3px solid #045397 "> --}}
			</div>
		@endforeach

		<div class="d-flex justify-content-center w-100">{{ $pages->links() }}</div>
	</div>
	<hr>
	<div class="row text-center">
		<div class="col-md-12 text-center">
			<h2 class="page-headings text-center">Common texts:</h2>
		</div>
		<div class="col-md-12 my-2">
			<a style="background:#045397; color:white;font-size:1.1rem;padding:10px;" href="{{route('single-text','header')}}" class="btn d-block text-center">Header</a>
		</div>

		<div class="col-md-12 my-2">
			<a style="background:#045397; color:white;font-size:1.1rem;padding:10px;" href="{{route('single-text','footer')}}" class="btn d-block text-center">Footer</a>
		</div>

		<div class="col-md-12 my-2">
			<a style="background:#045397; color:white;font-size:1.1rem;padding:10px;" href="{{route('single-text','cookies')}}" class="btn d-block text-center">Cookie Modal</a>
		</div>

		<div class="col-md-12 my-2">
			<a style="background:#045397; color:white;font-size:1.1rem;padding:10px;" href="{{route('single-text','three-buttons')}}" class="btn d-block text-center">Three buttons</a>
		</div>
		
	</div>
	{{-- <button class="btn-secondary btn" data-toggle="modal" data-target="#new-course-modal">+Add Text</button>
	<div class="modal fade" id="new-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add text</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.add-text') }}" id="new-course-form" method="POST">
					{{ csrf_field() }}
					<label for="" class="mb-0 mt-2 font-weight-bold">Text</label>
					<input type="text" class="form-control" required name="text_en">
					<label for="" class="mb-0 mt-2 font-weight-bold">Title</label>
					<input type="text" class="form-control" required name="title">
					<label for="" class="mb-0 mt-2 font-weight-bold">Slug</label>
					<select name="slug" id="" class="form-control" required>
						<option value="" selected disabled>-- Please select --</option>
						@foreach($pages as $page)
							<option value="{{ $page->getName() }}">{{ $page->getName() }}</option>
						@endforeach
					</select>
					<label for="" class="mb-0 mt-2 font-weight-bold">Ckeditor</label>
					<select name="editor" id="" class="form-control">
						<option value="" selected disabled>-- Please select --</option>
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</form>
			</div>
			<div class="modal-footer">
				<button  class="btn orange-button" form="new-course-form" >Save changes</button>
			</div>
		</div> --}}
	{{-- </div> --}}
</div>

 
@endsection
