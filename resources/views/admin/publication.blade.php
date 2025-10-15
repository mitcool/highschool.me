@extends('admin_template')

@section('content')
<div class="w-75 mx-auto shadow" style="padding:20px;">
	<div class="">
		<div class=" mt-4">
			<h1>All Publications</h1>
		</div>
		<button type="button" class="btn btn-success mt-2" data-toggle="modal" data-target="#add_publication_modal">Add Publication</button>
		<div class="col-lg-12">
			<hr>
			<div class="row">
				@foreach($publications as $publication)
					<div class="col-md-3 text-center">
						<img src="{{asset('images/publication-images')}}/{{$publication->picture}}" class="w-100">
						<form action="/delete-publication/{{$publication->id}}" method="POST">
							{{csrf_field()}}
							<button class="btn-danger btn mt-1">Delete</button>
						</form>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-lg-12 mt-3 border-top p-2 text-center">
			<p><i class="fas fa-exclamation-triangle" style="color:#F7C600;"></i> Up to 8 companies </p>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_publication_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Publication</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/upload-publication" method="POST" enctype="multipart/form-data" id="add_publication_form">
      	{{csrf_field()}}
	      	<div class="modal-body">
	      	<div class="row text-center">
	      		<div class="col-lg-12">
					@foreach(Config('languages') as $lang => $language)
	      				<input type="text" name="heading_{{ $lang }}" class="form-control my-2" placeholder="Heading({$lang})" required>
					@endforeach
	      		</div>
	      		<div class="col-lg-12">
					<textarea  id="summary_{{ $lang }}" name="summary_{{ $lang }}" placeholder="Summary"></textarea>
				</div>
	      		<div class="col-lg-6">
	      			<input type="number" name="pages" class="form-control my-2" placeholder="Pages" required>
	      		</div>
	      		<div class="col-lg-6">
	      			<input type="text" name="edition" class="form-control my-2" placeholder="Edition" required>
	      		</div>
	      		<div class="col-lg-6">
	      			<input type="number" name="year" class="form-control my-2" placeholder="Year" required>
	      		</div>
	      		<div class="col-lg-6">
	      			<input type="text" name="language" class="form-control my-2" placeholder="Language" required>
	      		</div>
	      		<div class="col-lg-6">
	      			<input type="text" name="isbn" class="form-control my-2" placeholder="ISBN" required>
	      		</div>
	      		
	      		<div class="col-lg-6">
					<label class="btn btn-secondary add-img-btn my-2" for="article_image">Add Image{{trans('messages.up-to-200')}}</label>
					<input id="article_image" type="file" name="article_image" accept="image/*">
				</div>
				 <div class="col-lg-6">
					<button class="btn btn-success add-img-btn my-2">Save Publication</button>
				</div>
				<div class="col-lg-12">
					<p class="text-secondary text-center" id="picture_name" style="margin:0 auto;"></p>
				</div>
	      	</div>
	      	<hr>
	      	<div class="row text-center">
	      		<div class="col-md-12">
	      			<small class="text-primary">*Please add a picture and than click save company button</small><br>
	      			<small class="text-primary">*Always discuss with graphic designer about the size of the image</small>
	      		</div>
	      	</div>
	      </div>
	    </div>
 	</form>     
  </div>
</div>

@endsection

@section('footerScripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#article_image').on('change',function(){
			let value  = $(this).val();
			value = value.substring(12);
			$('#picture_name').html(value);
		});
		CKEDITOR.replace('summary');
		$('#add_article_form').on('submit',function(e) {
			let summary = CKEDITOR.instances.summary.getData();
			if(!summary) {
				alert('Article text fields are required.');
				e.preventDefault();
			}	
		});
	});
</script>
@endsection