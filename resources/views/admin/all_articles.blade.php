@extends('admin_template')

@section('content')
<div class="container-fluid texts_container">
	<div class="row mx-2">
		<div class="col-lg-12 heading mt-4">
			<h1 class="text-center">All Articles</h1>
		</div>
		<div class="col-lg-12 mt-4 px-4 text-right">
			<a href="{{ route('add-new-article') }}" class="btn btn-success">
				<h3 class="m-0">New article</h3>
			</a>
			<hr>
		</div>
		@if(count($news) > 0)
		<div class="col-lg-12 mt-4 px-4 edit-article-div">
			@foreach($news as $n)
			<a href="{{route('edit-article', $n->id)}}">
				<h3 class="mb-4">
					<span>{{$n->translated->title}}</span>
					<span class="float-right">{{$n->created_at}}</span>
				</h3>
			</a>
			@endforeach
		</div>
		@else
		
		@endif
	
	</div>
</div>
@endsection