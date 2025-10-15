@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container">
	<form id="add_article_form" method="POST" action="{{route('publish-new-article')}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Add New Article</h1>
			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Media</h3>
				<div class="mt-3">
					<label class="btn btn-secondary add-img-btn" for="image">Add Image</label>
					<span class="img-name"></span>
					<input id="image" type="file" name="picture" accept="image/*">
				</div>
				<span class="text-primary" style="font-size:14px"> *{{trans('messages.up-to-200')}} </span> 
			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Title</h3>
					@foreach (Config::get('languages') as $lang => $language)
					<div>
						<h5 class="mt-3"><u>{{ $language }}</u></h5>
						<input class="input-text form-control" type="text" name="title_{{ $lang }}" required>
					</div>
					@endforeach

			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Slug</h3>
					@foreach (Config::get('languages') as $lang => $language)
					<div>
						<h5 class="mt-3"><u>{{ $language }}</u></h5>
						<input class="input-text form-control" type="text" name="slug_{{ $lang }}" required>
					</div>
					@endforeach

			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Description</h3>
				@foreach (Config::get('languages') as $lang => $language)
				<div>
					<h5 class="mt-3"><u>{{$language}}</u></h5>
					<textarea class="textarea form-control" name="description_{{ $lang }}"></textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Text</h3>
				@foreach (Config::get('languages') as $lang => $language)
				<div>
					<h5 class="mt-3"><u>{{ $language }}</u></h5>
					<textarea id="text-{{ $lang }}}" name="text_{{$lang}}" class="ckeditor"></textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Meta title</h3>
				@foreach (Config::get('languages') as $lang => $language)
				<div>
					<h5 class="mt-3"><u>{{ $language }}</u></h5>
					<textarea id="meta_title_{{ $lang }}}" name="meta_title_{{$lang}}" class="ckeditor"></textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				<h3 class="text-secondary">Meta discription</h3>
				@foreach (Config::get('languages') as $lang => $language)
				<div>
					<h5 class="mt-3"><u>{{ $language }}</u></h5>
					<textarea id="meta_description_{{ $lang }}}" name="meta_description_{{$lang}}" class="ckeditor"></textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 text-right my-5">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>
		</div>
	</form>
</div>
@endsection