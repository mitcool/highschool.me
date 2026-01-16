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

@section('content')
@php
    $breadcrumb_title = strtok(trans('about.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="student-spotlight" id="cover" class="main-pictures-pages" loading="eager"/>

<div class="container-fluid">
		
</div>
@endsection