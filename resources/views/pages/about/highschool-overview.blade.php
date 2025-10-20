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
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

{{-- <x-image-component nickname="digital_studies" class="digital_studies-images main-pictures-pages"/> --}}

<div class="container-fluid main_page_container" style="min-height: 100vh;">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<section>
				<h1 class="page-headings">{!! trans('digital-studies.heading') !!}</h1>
				<div class="page-content">{!! trans('digital-studies.text') !!}</div>
			</section>
			<div class="d-flex justify-content-center">
				<iframe width="800" height="450" src="https://www.youtube.com/embed/TZRz1KtPfN8?si=1SCyQX_SWoWm-MfL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<x-home.benefits />
@endsection
