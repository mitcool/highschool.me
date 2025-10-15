@extends('template')

@section('seo')
	<title>{{trans('publishing.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('publishing.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('publishing.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/buch-veroeffentlichen"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/book-publishing"/>
	@endif
	<meta property="og:description" content="{{ trans('publishing.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="publishing"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/book-publishing" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/buch-veroeffentlichen" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/book-publishing" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/book-publishing" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/buch-veroeffentlichen" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('publishing.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="publishing" class="publishing-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{trans('publishing.heading')}}</h1>
			
			<div class="page-content">{!! trans('publishing.text')!!}</div>

			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a class="btn orange-button" href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">{{trans('publishing.button')}}</a>
			</div>

			<div class="page-content">{!! trans('publishing.text-two')!!}</div>

			<div class="row d-flex align-items-center justify-content-center">
				<div id="first-coaching" class="col-md-6">
					<x-image-component nickname="book" class="coaching-images book" style="width:90%"/>
				</div>
				<div id="second-coaching" class="col-md-6">
					<div class="page-content">{!! trans('publishing.text-book') !!}</div>
				</div>
				
				<div id="third-coaching" class="col-md-6">
					<div class="page-content">{!! trans('publishing.text-ebook') !!}</div>
				</div>
				<div id="fourth-coaching" class="col-md-6">
					<x-image-component nickname="ebook" class="coaching-images ebook" style="width:90%"/>
				</div>
			</div>
			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a class="btn orange-button" href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">{{trans('publishing.button')}}</a>
			</div>
			
			<div  class="page-content ">{!! trans('publishing.text-bottom')!!}</div>
			
			<div class="text-center">
				<a class="btn mx-2 contact_btn_header orange-button" style="color:white;" href="{{ route('publishing-services-'.app()->currentLocale())}}">{{trans('publishing.services-button')}}</a> 
		   </div>
			<div  class="page-content ">{!! trans('publishing.text-last')!!}</div>
			<div class="row d-flex align-items-center justify-content-center" style="padding-top:50px;">	
				<a class="btn orange-button" href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">{{trans('publishing.button')}}</a>
			</div>

			<!-- Modal Table -->
			
		</div>
	</div>
</div>

@endsection
