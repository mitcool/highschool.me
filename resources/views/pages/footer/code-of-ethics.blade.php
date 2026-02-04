@extends('template')


@section('seo')
	<title>{{trans('code-of-ethics.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('code-of-ethics.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{trans('code-of-ethics.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/code-of-ethics"/>
	<meta property="og:description" content="{{ trans('code-of-ethics.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="code-of-ethics"/>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('code-of-ethics.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="code-of-ethics" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8 container-style bg-white">
			<h1 class="page-headings">{{trans('code-of-ethics.heading')}}</h1>
			<div class="page-content">{!! trans('code-of-ethics.text') !!}</div>
			
		</div>
	</div>
</div>

@endsection
