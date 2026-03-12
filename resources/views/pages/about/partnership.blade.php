@extends('template')

@section('headCSS')
<style>
	.box{
		padding:20px;
		border:1px solid #707070;
		height: 100%;
		margin:20px 0;
		border-radius: 15px;
		background: white!important;
	}
	@media(max-width:1200px){
		.box-wrapper{
			margin-top:10px;
		}
		
	}
</style>
@endsection
@section('seo')
	<title>{{ trans('accreditation.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('accreditation.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{ trans('accreditation.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/accreditation-partners"/>
	<meta property="og:description" content="{{ trans('accreditation.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

@endsection


@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Education Partners & Industry Providers</li>
	</ol>
</div>

<img src="{{ asset('images/education-and-partnership.png') }}" alt="" class="w-100">
<div class="container-fluid ">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white page-content" style="padding:30px;">
			<h1 class="page-headings" id="start">Education Partners & Industry Providers</h1>
			<div class="text-justify page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer </div>
			<br>
			
		</div>
	</div>
</div>
<div class="container-fluid bg-light" style="padding:20px;">
	<div class="container">
		<div class="text-center mt-3">
			<h2 style="color: #045397;">Education Partners</h2>
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
			<h2 style="color: #045397;">Industry Providers</h2>
		</div>
		<div class="row mt-2">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l01.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l02.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l03.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l04.png') }}" alt="" class="w-100">
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l05.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l06.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l07.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l08.png') }}" alt="" class="w-100">
				</div>
			</div>
		</div>
		<div class="row mt-2" >
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l09.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l10.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l11.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l12.png') }}" alt="" class="w-100">
				</div>
			</div>
		</div>
		<div class="row mt-2" style="margin-bottom: 50px;">
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l13.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l14.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l15.png') }}" alt="" class="w-100">
				</div>
			</div>
			<div class="col-md-3 text-center box-wrapper mb-3">
				<div class="box">
					<img src="{{ asset('images/l16.png') }}" alt="" class="w-100">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
