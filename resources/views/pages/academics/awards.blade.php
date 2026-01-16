@extends('template')
@section('seo')
<title>{{ trans('study-registration.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/bewerbung-studium"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-portal"/>
@endif
<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>

@endsection


@section('headCSS')

<style>

.form-control,
.form-control:focus,
.form-control:active{

	outline: none !important;
}
.time-button,
.studies-button{
	background-color:white;
	border:1px solid black;
	min-width: 180px;
	max-width: 200px;
	cursor: pointer;
}
.selected-button{
	background-color:#d3ebff !important;
}
</style>

@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Awards</li>
	</ol>
</div>
<img src="{{ asset('images/go.png') }}" alt="">	
<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 shadow text-center p-4 bg-white" style="margin: 20px auto;">
				<h1 class="page-headings">Awards</h1>
				<div class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Studieren und Promovieren sind nicht nur akademische </div>
				<hr>
				<div class="row p-2">
					<div class="col-md-3">
						<img src="{{ asset('images/award-1.png') }}" alt="">
					</div>
					<div class="col-md-9">
						<h3 class="font-weight-bold text-left">President's Award for Educational Excellence</h3>
						<div class="page-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse a repudiandae soluta molestiae dicta harum deleniti in laboriosam ipsum, quaerat alias ipsam eos facilis consequuntur ad. Nulla, eligendi tempora! Praesentium modi in maxime. Esse, labore vitae. Nesciunt ratione rerum labore dignissimos facilis necessitatibus minima omnis consectetur, nostrum delectus eum?	</div>
					</div>
				</div>
				<hr>
				<div class="row p-2">
					<div class="col-md-9">
						<h3 class="font-weight-bold text-left">President's Award for Educational Achievement</h3>
						<div class="page-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse a repudiandae soluta molestiae dicta harum deleniti in laboriosam ipsum, quaerat alias ipsam eos facilis consequuntur ad. Nulla, eligendi tempora! Praesentium modi in maxime. Esse, labore vitae. Nesciunt ratione rerum labore dignissimos facilis necessitatibus minima omnis consectetur, nostrum delectus eum?	</div>
					</div>
					<div class="col-md-3">
						<img src="{{ asset('images/award-2.png') }}" alt="">
					</div>
				</div>
				<hr>
				<div class="row p-2">
					<div class="col-md-3">
						<img src="{{ asset('images/award-3.png') }}" alt="">
					</div>
					<div class="col-md-9">
						<h3 class="font-weight-bold text-left">American Citizenship Award</h3>
						<div class="page-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse a repudiandae soluta molestiae dicta harum deleniti in laboriosam ipsum, quaerat alias ipsam eos facilis consequuntur ad. Nulla, eligendi tempora! Praesentium modi in maxime. Esse, labore vitae. Nesciunt ratione rerum labore dignissimos facilis necessitatibus minima omnis consectetur, nostrum delectus eum?	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

