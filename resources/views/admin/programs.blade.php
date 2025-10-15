@extends('admin_template')

@section('headScripts')
<style type="text/css">
	.update-program-link {
		text-decoration: none;
		color: black;
		border: 1px solid black;
		padding: 5px;
		font-weight: 600;
		border-radius: 10px;
		background-color: white;
	}

	.update-program-link:hover {
		text-decoration: none;
	}
</style>
@endsection

@section('content')

<div class=" texts_container mx-auto">
	<div class="mx-auto my-2 col-md-12 text-center">
	<h3 class="text-center">Add new program</h3>
	<div class="col-lg-12" style="margin: 0 auto;">
		<a href="{{route('add-program-page')}}" class="btn btn-info">Add program</a>
	</div>
</div>
	<div class="text-center pt-5">
		<h3>Existing programs</h3>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Name of the program</th>
				<th scope="col">Examination Fee</th>
				<th scope="col">Examination Fee</th>
				<th scope="col">Study</th>
				<th scope="col">Update</th>
			</tr>
		</thead>
		<tbody>
			@foreach($programs as $prog)
			<tr>
				<th scope="row"></th>
				<td>{{$prog->translated->name}}</td>
				<td>{{$prog->enrollment_fee}} EUR</td>
				<td>{{$prog->examination_fee}} EUR</td>
				<td>{{$prog->study->key }}</td>
				<td><a href="{{route('update-program-page', [$prog->translated->slug])}}" class="update-program-link">Update Now</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	<div class="text-center pt-5">
		<form method="POST" action="{{route('admin-add-redeem-code')}}">
			@csrf
			<h3>Redeem code</h3>
			<div class="col-lg-6" style="margin: 0 auto;">
				<input type="text" name="voucher_code">
			</div>
			<div class="col-lg-6 mt-2" style="margin: 0 auto;">
				<button type="submit" class="btn btn-info">Apply code</button>
			</div>
		</form>
	</div>
</div>
@endsection