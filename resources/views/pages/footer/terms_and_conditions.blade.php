@extends('template')

@section('seo')
	<title>{{trans('terms-and-conditions.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('terms-and-conditions.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('terms-and-conditions.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/agb"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/terms-conditions"/>
	@endif
	<meta property="og:description" content="{{ trans('terms-and-conditions.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="term_and_conditions"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/terms-conditions" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/agb" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/terms-conditions" hreflang="x-default" />
@endsection



@section('content')
@php
    $breadcrumb_title = strtok(trans('terms-and-conditions.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="term_and_conditions" class="term_and_conditions-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{!!trans('terms-and-conditions.heading')!!}</h1>
			<div class="page-content">{!!trans('terms-and-conditions.text')!!}</div>
			
		</div>
	</div>
</div>

@endsection
