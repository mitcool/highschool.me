@extends('template')


@section('seo')
<title>{{ trans('about.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('about.meta-description') }}" />

<meta itemprop="name" property="og:title" content="{{ trans('about.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/ueber-uns"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/about-us"/>
@endif
<meta property="og:description" content="{{ trans('about.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="about-cover"/>

<link rel="alternate" href="{{ config('app.url') }}/en/about-us" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/ueber-uns" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/about-us" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/about-us" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/ueber-uns" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('about.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="about-cover" id="cover" class="main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">

	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{ trans('about.heading') }}</h1>
			<div class="text-justify page-content">{!! trans('about.text') !!}</div>
			<div class="row d-flex align-items-center justify-content-center">
				<div id="first-coaching" class="col-md-6">
					<x-image-component nickname="professional-graduates" class="coaching-images professional-graduates" style="width:90%"/>
				</div>
				<div id="second-coaching" class="col-md-6">
					<div class="page-content">{!! trans('about.professional-graduates-text') !!}</div>
				</div>
				<div id="third-coaching" class="col-md-6">
					<div class="page-content">{!! trans('about.bachelor-graduates-text') !!}</div>
				</div>
				<div id="fourth-coaching" class="col-md-6">
					<x-image-component nickname="bachelor-graduates-professionals" class="coaching-images bachelor-graduates-professionals" style="width:90%"/>
				</div>
				<div id="fifth-coaching" class="col-md-6">
					<x-image-component nickname="master-graduates" class="coaching-images master-graduates" style="width:90%"/>
				</div>
				<div id="sixth-coaching" class="col-md-6">
					<div class="page-content">{!! trans('about.master-graduates-text') !!}</div>
				</div>
			</div>
			<div class="text-justify page-content">{!! trans('about.about-middle-text') !!}</div>
			<div id="sixth-coaching" class="col-md-12">
				<x-image-component nickname="award" class="award" style="width:100%"/>
			</div>
			<div class="text-justify page-content">{!! trans('about.about-bottom-text') !!}</div>
			<div class="row d-flex align-items-center">
				<div class="col-lg-3">
					<x-image-component nickname="about-image-president" class="about-image-president" style="width:100%"/>
				</div>
				<div class="col-lg-9">
					<div class="text-justify page-content">{!! trans('about.president-text') !!}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection