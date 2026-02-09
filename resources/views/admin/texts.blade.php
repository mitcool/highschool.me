@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Please select a page for edit</h2>
			<hr>
		</div>
		@foreach($pages as $page)
			
			<div class="col-md-4 my-2">
				<a href="{{route('single-text',$page)}}" style="text-decoration: none;color:black;">
					<div class="shadow text-center text-capitalize" style="padding:30px;background: linear-gradient(115deg, #62cff4, #31aad2)
">
						<h5>{{$page}}</h5>
					</div>
				</a>
			</div>
		@endforeach
	</div>
</div>

@endsection
