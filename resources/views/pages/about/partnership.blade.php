@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('partnership')}}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

@endsection

@section('headCSS')
<style>
	.box{
		padding:20px;
		border:1px solid #707070;
		height: 100%;
		margin:20px 0;
		border-radius: 15px;
		background: white !important;

		display: flex;
		justify-content: center;
		align-items: center;
	}

	.box img{
		max-width: 100%;
		max-height: 100%;
		object-fit: contain;
	}

	@media(max-width:1200px){
		.box-wrapper{
			margin-top:10px;
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

<x-image-component nickname="miami-city-skyline-waterfront" class="w-100" loading="eager"/>

<div class="container-fluid ">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white page-content" style="padding:30px;">
			<h1 class="page-headings" id="start">{{ $texts['heading'] }}</h1>
			<div class="text-justify page-content">{!! $texts['content'] !!}</div>
			<br>
			
		</div>
	</div>
</div>
<div class="container-fluid bg-light" style="padding:20px;">
	<div class="container">
		<div class="text-center mt-3">
			<h2 style="color: #045397;">{{ $texts['education-partners'] }}</h2>
		</div>
		<div class="row">
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-1.png') }}" alt="" class="">
				</div>
			</div>
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-3.png') }}" alt="" class="">
				</div>
			</div>
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-2.png') }}" alt="" class="">
				</div>
			</div>
		</div>
		<div class="row mt-2" style="margin-bottom:50px;">
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-1.png') }}" alt="" class="">
				</div>
			</div>
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-3.png') }}" alt="" class="">
				</div>
			</div>
			<div class="col-md-4 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/partnership-2.png') }}" alt="" class="">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-white">
	<div class="container">
		<div class="text-center mt-4">
			<h2 style="color: #045397;">{{ $texts['industry-providers'] }}</h2>
		</div>
		<div class="row mt-2">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="adobe-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="cisco-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="certiport-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="nha-logo" class="w-100" loading="eager" />
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="intuit-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="oracle-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="google-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="american-red-cross-logo" class="w-100" loading="eager" />
				</div>
			</div>
		</div>
		<div class="row mt-2" >
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="hubspot-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="amazon-web-services-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="ncct-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="nals-logo" class="w-100" loading="eager" />
				</div>
			</div>
		</div>
		<div class="row mt-2" style="margin-bottom: 50px;">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="meta-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="microsoft-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="comptia-logo" class="w-100" loading="eager" />
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<x-image-component nickname="ibm-logo" class="w-100" loading="eager" />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
