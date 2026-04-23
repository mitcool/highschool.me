@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('awards') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
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
	@media(max-width:1000px){
		.reverse{
			flex-direction: column-reverse;
		}
	}
</style>

@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-9 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['breadcrumb'] }}</li>
	</ol>
</div>

<x-image-component nickname="gold-trophy-city-lights-background" class="w-100" loading="eager"/>

<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-9 text-center p-4 bg-white" style="margin: 20px auto;">
				<h1 class="page-headings">{{ $texts['heading'] }}</h1>
				<div class="page-content">{!! $texts['intro'] !!}</div>
				<hr>
				<div class="row p-2">
					<div class="col-md-3">
						<x-image-component nickname="gold-medal-ribbon-presidents-award" class="w-100" loading="eager"/>
					</div>
					<div class="col-md-9 page-content">
						{!! $texts['first-award'] !!}
					</div>
				</div>
				<hr>
				<div class="row p-2 reverse">
					<div class="col-md-9 page-content">
						{!! $texts['second-award'] !!}
					</div>
					<div class="col-md-3">
						<x-image-component nickname="silver-medal-ribbon-presidents-award" class="w-100" loading="eager"/>
					</div>
				</div>
				<hr>
				<div class="row p-2">
					<div class="col-md-3">
						<x-image-component nickname="american-citizenship-award-shield-badge" class="w-100" loading="eager"/>
					</div>
					<div class="col-md-9 page-content">
							{!! $texts['third-award'] !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

