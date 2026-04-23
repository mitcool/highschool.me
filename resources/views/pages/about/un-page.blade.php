@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />

	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('united-nations') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

@endsection

@section('headCSS')
	<style>
		.iso-actions {
			text-align: center;
		}
		.iso-show-all {
			display: inline-block;
			background: #005aa7;
			color: #fff;
			padding: 10px 28px;
			border-radius: 28px;
			font-size: 18px;
			font-weight: 700;
			text-decoration: none;
			line-height: 1;
		}
		.iso-show-all:hover,
		.iso-show-all:focus {
			color: #fff;
			text-decoration: none;
		}
	</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('accreditation') }}">Recognition & Quality Standards</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
	</ol>
</div>

<div class="container-fluid main_page_container pt-0">
	<div class="row justify-content-center">
		<div class="text-center mb-4">
			<x-image-component nickname="united-nations-sdg-4-globe-icon" loading="eager" />
		</div>
		<div class="col-md-10 col-lg-8 mb-4 text-center">
			<h1>{{ $texts['heading'] }}</h1>
			<div class="text-justify">
				{!! $texts['content'] !!}
			</div>
		</div>
	</div>
	<div class="iso-actions pb-5">
		<a href="{{ route('accreditation') }}" class="iso-show-all">Show All</a>
	</div>
</div>
@endsection
