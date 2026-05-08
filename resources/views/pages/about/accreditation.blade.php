@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('accreditation') }}/en/accreditation-partners"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>
@endsection

@section('headCSS')
	<style>
		.accreditation-read-more{
			display:inline-block;
			margin-top: 10px;
			text-decoration:none !important;
		}

		@media(max-width:800px){
			.image-accreditation div{
				display: flex;
				justify-content: center;
				margin:0 auto;
				padding:20px;
			}
			.reverse{
				flex-direction: column-reverse;
			}
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


	{{-- <x-image-component nickname="accreditation-cover" id="cover" class="main-pictures-pages " loading="eager" /> --}}


<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 mb-4 bg-white">
			<h1 class="page-headings" id="start">{{ $texts['heading'] }}</h1>
			<div class="text-justify page-content">
				{!! $texts['first-paragraph'] !!}
			</div>
			<br>
			
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation">
					<div>
						<x-image-component nickname="fldoe-logo" class="w-100" loading="eager" />
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['florida-department'] !!}
						<a href="{{ route('florida-department') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
			</div>
			{{--
			<div class="row reverse" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['college-board'] !!}
						<a href="{{ route('college-board') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="college-board-logo" class="w-100" loading="eager" />
					</div>
				</div>
			</div>
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation">
					<div>
						<x-image-component nickname="act-inc-logo" class="w-100" loading="eager" />
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['american-college'] !!}
						<a href="{{ route('american-college-test') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
			</div>
			--}}
			<div class="row reverse" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['iso-9001'] !!}
						<a href="{{ route('first-iso') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="iso-9001-logo" class="w-100" loading="eager" />
					</div>
				</div>
			</div>
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="iso-21001-logo" class="w-100" loading="eager" />
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['iso-2018'] !!}
						<a href="{{ route('second-iso') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
			</div>
			{{--
			<div class="row reverse" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
					{!! $texts['iso-2022'] !!}
						<a href="{{ route('third-iso') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="iso-27001-logo" class="w-100" loading="eager" />
					</div>
				</div>
			</div>
			--}}
			<div class="row reverse" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
					{!! $texts['united-nations'] !!}
						<a href="{{ route('united-nations') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="united-nations-logo" class="w-100" loading="eager" />
					</div>
				</div>
			</div>
			{{--
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component nickname="united-nations-logo" class="w-100" loading="eager" />
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						{!! $texts['united-nations'] !!}
						<a href="{{ route('united-nations') }}" class="orange-button btn accreditation-read-more">{{ $texts['read-more'] }}</a>
					</div>
				</div>
			</div>
			--}}
			<br>
		</div>
	</div>
</div>
@endsection
