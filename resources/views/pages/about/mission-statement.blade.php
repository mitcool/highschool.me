@extends('template')

@section('seo')

<title>{{ $texts['meta-title'] }}</title>
<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content="{{ route('mission-statement')}}"/>
<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
<x-meta-image itemprop="image" nickname="recognition_of_previous_achievemnts"/>
@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
	</ol>
</div>

<x-image-component nickname="american-flag-background-independence-day" class="w-100" loading="eager"/>

<div class="container-fluid pb-4">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white">
			<h1 class="page-headings">{{ $texts['heading'] }}</h1>
			<div class="page-content">
				{!! $texts['first-section-text'] !!}
			</div>
		</div>
	</div>

	<div class="row justify-content-center" style="background-color: #024883;">
		<div class="col-md-10 col-lg-8 p-3 text-center">
			<h2 style="color: white;" class="pt-3 pb-3">{{ $texts['second-section-heading'] }}</h2>
			<div class="page-content">
				<div style="color: white;">
					{!! $texts['second-section-text'] !!}
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 p-3 text-center">
			<h2 class="pt-3 pb-3">{{ $texts['third-section-heading'] }}</h2>
			<div class="page-content">
				{!! $texts['third-section-text'] !!}
			</div>
		</div>
	</div>

	<x-three-buttons/>
</div>

@endsection