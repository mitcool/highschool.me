@extends('template')

@section('content')
	<div class="wrapper mt-0 text-center" style="background-image:url('/images/BG_WORMHOLE.png');background-size:cover">
		<img src="{{asset('images/cartoon-student-frustrated-scattered-devices.webp')}}" alt="Cartoon frustrated student with devices" title="Cartoon illustration of a frustrated student sitting among scattered digital devices.">
		<div class="title" style="padding:30px;">   
		    <h1 class="blue-heading font-weight-bold" style="text-align: center;margin-bottom: 20px;font-family:'Roboto','Helvetica';">Error 404 - Page not found</h1>
		    <p class="text-center page-content">Looks like this page took a wrong turn somewhere. Don't worry though - let's get you back on track and find what you're looking for instead.</p>
			<a href="{{route('welcome')}}" style="cursor: pointer;">
		        <button class="orange-button btn btn-lg">
		            Go to Homepage
		        </button>
		    </a>
		</div>
	</div>
@endsection