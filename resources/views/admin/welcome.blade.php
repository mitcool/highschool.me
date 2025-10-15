@extends('admin_template')
<style>
	.card{
        background: red;
		border-radius:5px;
		border-color: #025297;
	}

</style>
@section('content')


<div class="container"><div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h1 class="text-center pt-5">Welcome {{ auth()->user()->name }}</h1>
    </div>	
</div>
          


@endsection