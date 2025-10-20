@extends('template')


@section('seo')
	<title>{{trans('accessibility.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('accessibility.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{trans('accessibility.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('accessibility')}}"/>
	<meta property="og:description" content="{{ trans('accessibility.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="accessibility"/>

@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('accessibility.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="accessibility" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8">
			<h1 class="page-headings">{{trans('accessibility.heading')}}</h1>
			<div class="page-content">{!! trans('accessibility.text') !!}</div>
			
		</div>
	</div>
</div>

@endsection
