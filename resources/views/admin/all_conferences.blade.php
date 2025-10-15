@extends('admin_template')

@section('content')

<div class="container-fluid texts_container">
	<div class="row mx-2">
		<div class="col-lg-12 heading mt-4">
			<h1>All Conferences</h1>
		</div>
		@if(count($conferences) > 0)
		<div class="col-lg-12 mt-4 px-4 edit-article-div">
			@foreach($conferences as $c)
			<a href="{{route('edit-conference', $c->id)}}">
				<h3 class="mb-4">
					<span>{{$c->translated->heading}}</span>
					<span class="float-right">{{$c->created_at}}</span>				
				</h3>
			</a>
			@endforeach
		</div>
		@else
		<div class="col-lg-12 mt-4 px-4">
			<h3>No conferences to list at the moment.</h3>
		</div>
		@endif
	</div>
</div>
@endsection