@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container">
	<form id="edit_article_form" method="POST" action="{{route('edit-article-post', $article->id)}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Edit Article</h1>
			</div>
		
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Title {{ $article_translation->locale }}</u></h5>
					<input 
						class="input-text form-control" 
						type="text" 
						name="{{'title_'.$article_translation->locale}}"
						value="{{$article_translation->title}}" 
						required
					/>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Key Facts</u></h5>
					<textarea class="ckeditor" name="{{'key_facts_'.$article_translation->locale}}">{{$article_translation->key_facts}}</textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
					<div>
						<h5 class="mt-3"><u>Slug {{ $article_translation->locale }}</u></h5>
						<input 
							class="input-text form-control" 
							type="hidden" 
							name="{{'old_slug_'.$article_translation->locale}}"
							value="{{$article_translation->slug}}" 
							required
						/>
						<input 
							class="input-text form-control" 
							type="text" 
							name="{{'slug_'.$article_translation->locale}}"
							value="{{$article_translation->slug}}" 
							required
						/>
					</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Description {{ $article_translation->locale }}</u></h5>
					<textarea class="textarea form-control" name="{{'description_'.$article_translation->locale}}" rows="4">{{$article_translation->description}}</textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Content description</u></h5>
					<textarea class="ckeditor" name="{{'text_'.$article_translation->locale}}">{{$article_translation->text}}</textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Meta title {{ $article_translation->locale }}</u></h5>
					<textarea class="ckeditor" name="{{'meta_title_'.$article_translation->locale}}">{{$article_translation->meta_title}}</textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 mt-5">
				@foreach($article->all_translations as $article_translation)
				<div>
					<h5 class="mt-3"><u>Meta description {{ $article_translation->locale }}</u></h5>
					<textarea class="ckeditor" name="{{'meta_description_'.$article_translation->locale}}">{{$article_translation->meta_description}}</textarea>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 text-center my-5">
				<button type="submit" class="btn btn-success" name="publish">Publish</button>
			</div>
		</div>
	</form>
	<div class="text-right m-4">
		<hr>
		<form action="{{ route('delete-news',$article->id) }}" method="post">
			{{ csrf_field() }}
			<button type="submit" class="btn my-2 btn-danger" name="delete">Delete</button>
		</form>
		<a href="{{route('all-articles')}}" class="btn btn-secondary">Back</a>
	</div>
	
</div>
@endsection