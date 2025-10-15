@extends('template')

@section('seo')
	<title>{{ trans('digital-studies.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('digital-studies.meta-description')}}" />

	<meta itemprop="title" property="og:title" content="{{ trans('digital-studies.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/online-studieren"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/smart-studies"/>
	@endif
	<meta property="og:description" content="{{ trans('digital-studies.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/smart-studies" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/en/smart-studies" hreflang="x-default" />
	<link rel="alternate" href="{{ config('app.url') }}/de/online-studieren" hreflang="de" />
@endsection


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/smart-studies" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/online-studieren" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('digital-studies.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="digital_studies" class="digital_studies-images main-pictures-pages"/>

<div class="container-fluid main_page_container" style="min-height: 100vh;">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<section>
				<h1 class="page-headings">{!! trans('digital-studies.heading') !!}</h1>
				<div class="page-content">{!! trans('digital-studies.text') !!}</div>
			</section>
			
			<section>
					<div class="row d-flex align-items-center justify-content-center">
				<div id="first-coaching" class="col-md-6">
					<x-image-component nickname="1" class="coaching-images 2" style="width:90%"/>
				</div>
				<div id="second-coaching" class="col-md-6">
					<div class="page-content">{!! trans('digital-studies.text-prestigious-study-content') !!}</div>
				</div>
				<div id="third-coaching" class="col-md-6">
					<div class="page-content">{!! trans('digital-studies.text-optional-online-events') !!}</div>
				</div>
				<div id="fourth-coaching" class="col-md-6">
					<x-image-component nickname="2" class="coaching-images 2" style="width:90%"/>
				</div>
				<div id="fifth-coaching" class="col-md-6">
					<x-image-component nickname="3" class="coaching-images 3" style="width:90%"/>
				</div>
				<div id="sixth-coaching" class="col-md-6">
					<div class="page-content">{!! trans('digital-studies.text-digital-exams') !!}</div>
				</div>
			</div>
			</section>

		
			<section class="page-content">{!! trans('digital-studies.text-before-message') !!}</section>
			<section class="row d-flex align-items-center justify-content-center">
				<div class="col-md-8">
					<x-image-component nickname="4" class="coaching-images 4" style="width:90%"/>
				</div>
				<div class="col-md-4">
					<div class="page-content">{!! trans('digital-studies.text-message-bottom') !!}</div>
				</div>
			</section>	
			<br>
			<section>
				<div class="page-content">{!! trans('digital-studies.text-bottom') !!}</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<br>
						<a href="{{route('student-advisory-service-'.app()->currentLocale())}}" class="btn orange-button">{{ trans('recognition.button') }}</a>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

@endsection
