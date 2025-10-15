@extends('admin_template')

@section('content')
<div class="w-75 mx-auto shadow" style="padding:20px;">
		<div class="row mx-2">
		<div class="col-lg-12 heading mt-4">
			<h1>All Publications</h1>
		</div>
		<div class="col-lg-12 mt-4 px-4 edit-article-div">
			@foreach($publications as $p)
			<a href="{{route('edit-publication', $p->id)}}">
				<h3 class="mb-4">
					<span>{{$p->translated->heading}}</span>
					<span class="float-right">{{$p->created_at}}</span>
				</h3>
			</a>
			@endforeach
		</div>
	
	</div>
</div>
@endsection