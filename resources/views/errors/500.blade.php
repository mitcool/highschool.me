@extends('template')

@section('content')
	<div class="wrapper mt-0 text-center" style="background-image:url('/images/BG_WORMHOLE.png');background-size:cover">
		<img src="{{asset('images/BACKPACK.png')}}">
		<div class="title" style="padding:30px;">   
		    <h1 class="blue-heading font-weight-bold" style="text-align: center;margin-bottom: 20px;font-family:'Roboto','Helvetica';">Error 500 - Internal Server Error</h1>
		    <p class="text-center page-content">The server was unable to complete your request. Please try again later. If this problem persists, please contact support!</p>
			<a href="{{route('welcome')}}" style="cursor: pointer;">
		        <button class="orange-button btn btn-lg">
		            Go to Homepage
		        </button>
		    </a>
		</div>
	</div>
@endsection