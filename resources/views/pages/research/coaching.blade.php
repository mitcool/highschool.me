@extends('template')

@section('seo')
<title>{{trans('coaching.meta-title')}}</title>
<meta itemprop="description" name="description" content="{{ trans('coaching.meta-description') }}" />

<meta itemprop="title" property="og:title" content="{{trans('coaching.meta-title')}}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/coaching"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/coaching-services"/>
@endif
<meta property="og:description" content="{{ trans('coaching.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="coaching"/>

<link rel="alternate" href="{{ config('app.url') }}/en/coaching-services" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/coaching" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/coaching-services" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/coaching-services" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/coaching" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('coaching.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="coaching" class="coaching-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{trans('coaching.heading')}}</h1>
			<div class="page-content">{!! trans('coaching.starting-text') !!}</div>
			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}" class="btn orange-button" style="margin-bottom:30px;">{{trans('coaching.button')}}</a>
			</div>
			<div class="page-content">{!! trans('coaching.experience-text') !!}</div>
			<div class="row d-flex align-items-center justify-content-center">
				<div id="first-coaching" class="col-md-6">
					<x-image-component nickname="coaching-session" class="coaching-images coaching-session" style="width:90%"/>
				</div>
				<div id="second-coaching" class="col-md-6">
					<div class="page-content">{!! trans('coaching.education-text') !!}</div>
				</div>
				<div id="third-coaching" class="col-md-6">
					<div class="page-content">{!! trans('coaching.management-text') !!}</div>
				</div>
				<div id="fourth-coaching" class="col-md-6">
					<x-image-component nickname="board-presentation" class="coaching-images board-presentation" style="width:90%"/>
				</div>
				<div id="fifth-coaching" class="col-md-6">
					<x-image-component nickname="colleagues-celebrate-success" class="coaching-images colleagues-celebrate-success" style="width:90%"/>
				</div>
				<div id="sixth-coaching" class="col-md-6">
					<div class="page-content">{!! trans('coaching.career-text') !!}</div>
				</div>
			</div>
			<div class="page-content">{!! trans('coaching.individual-coaching-text') !!}</div>
			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}" class="btn orange-button" style="margin-bottom:30px;">{{trans('coaching.button')}}</a>
			</div>
			<div class="page-content">{!! trans('coaching.group-coaching-text') !!}</div>
			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}" class="btn orange-button">{{trans('coaching.button')}}</a>
			</div>
		</div>
	</div>
</div>

@endsection
