@extends('template')

@section('seo')
<title>{{trans('conferences-and-workshops.meta-title')}}</title>
<meta itemprop="description" name="description" content="{{ trans('conferences-and-workshops.meta-description') }}" />

<meta itemprop="title" property="og:title" content="{{trans('conferences-and-workshops.meta-title')}}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/konferenzen-und-workshops"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/conferences-workshops"/>
@endif
<meta property="og:description" content="{{ trans('conferences-and-workshops.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="conferences"/>

<link rel="alternate" href="{{ config('app.url') }}/en/conferences-workshops" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/konferenzen-und-workshops" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/conferences-workshops" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/conferences-workshops" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/konferenzen-und-workshops" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('conferences-and-workshops.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component loading="eager" nickname="conferences" class="conferences-images main-pictures-pages"/>

<div class="container-fluid main_page_container">

	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{trans('conferences-and-workshops.heading')}}</h1>
			<div class="page-content">{!! trans('conferences-and-workshops.text') !!}</div>
			<div class="text-center">
				<a class="btn orange-button mt-5" href="{{route('conference-calendar-'.app()->currentLocale())}}">{{trans('conferences-and-workshops.button')}}</a>
			</div>
		</div>
	</div>
</div>

@endsection
