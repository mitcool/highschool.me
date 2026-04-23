@extends('template')
@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('international-students') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description']}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection

@section('headCSS')

<style>

.form-control,
.form-control:focus,
.form-control:active{

	outline: none !important;
}
.time-button,
.studies-button{
	background-color:white;
	border:1px solid black;
	min-width: 180px;
	max-width: 200px;
	cursor: pointer;
}
.selected-button{
	background-color:#d3ebff !important;
}
</style>

@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
	</ol>
</div>

<x-image-component nickname="colorful-world-globe-close-up" class="w-100" loading="eager"/>

<div class="container-fluid bg-white main_page_container mb-2">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 text-justify p-4 bg-white page-content" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold page-headings">{{ $texts['heading'] }}</h1>
				{!! $texts['intro'] !!}
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('images/international-students.png') }}" alt="" class="w-100"/> 
					</div>
					<div class="col-md-6">
						{!! $texts['content'] !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<x-three-buttons/>
@endsection

