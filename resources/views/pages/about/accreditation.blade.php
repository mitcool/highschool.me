@extends('template')

@section('seo')
	<title>{{ trans('accreditation.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('accreditation.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{ trans('accreditation.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/akkreditierung-und-partner"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/accreditation-partners"/>
	@endif
	<meta property="og:description" content="{{ trans('accreditation.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/accreditation-partners" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/akkreditierung-und-partner" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/accreditation-partners" hreflang="x-default" />

@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('accreditation.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Recognition & Quality Standards</li>
	</ol>
</div>

<x-image-component nickname="accreditation-cover" id="cover" class="main-pictures-pages " loading="eager" />
<div class="container-fluid main_page_container ">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 mb-4 bg-white">
			<h1 class="page-headings" id="start">Recognition & Quality Standards</h1>
			<div class="text-justify page-content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus orci mauris, in fringilla turpis sagittis ut. Suspendisse ultrices aliquam elit, quis faucibus magna dignissim sit amet. Sed fermentum cursus elit, at scelerisque tellus luctus non. Duis non gravida nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent in volutpat enim, et aliquam leo. Suspendisse pellentesque sagittis sem, sed viverra diam. In suscipit sit amet ante eget tristique. Etiam finibus purus ut nulla condimentum maximus. Phasellus sollicitudin cursus purus.</p>
				<p> Donec venenatis eleifend lacus, ac interdum est elementum quis. Nullam ultricies semper nisl, sed consectetur turpis pulvinar non. Donec posuere mauris velit, eget placerat tellus vulputate quis. Nullam condimentum odio vel rhoncus consequat.</p>
				<p> Duis euismod ligula sit amet velit ullamcorper convallis. Duis non justo eu neque molestie tincidunt. Nunc in felis at leo laoreet pellentesque. In hac habitasse platea dictumst. Cras vel lobortis arcu. Mauris gravida enim nulla. In hac habitasse platea dictumst. Morbi interdum urna sed mauris maximus egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ornare efficitur libero eu consequat.</p>
				<p> Duis eget mi leo. Aenean vulputate ac justo suscipit consequat. Donec semper tellus porttitor iaculis euismod. Aenean dignissim nunc ipsum, vitae sodales nisi venenatis at. Maecenas dapibus elit a ex laoreet venenatis.</p>
			</div>
			<br>
			
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<img src="{{ asset('images/icons/recognition-4.png') }}" class="w-100">
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						<h4 class="font-weight-bold">ISO 9001:2015</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis explicabo quam id delectus alias unde, commodi quis assumenda odit inventore.</p> 
					</div>
				</div>
			</div>
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						<h4 class="font-weight-bold">ISO 21001:2018</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis explicabo quam id delectus alias unde, commodi quis assumenda odit inventore.</p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<img src="{{ asset('images/icons/recognition-5.png') }}" class="w-100">
					</div>
				</div>
				
			</div>
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-3 justify-content-start  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<img src="{{ asset('images/icons/recognition-6.png') }}" class="w-100">
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						<h4 class="font-weight-bold">ISO 27001:2018</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis explicabo quam id delectus alias unde, commodi quis assumenda odit inventore.</p>
					</div>
				</div>
			</div>
			<div class="row" style="padding:20px;">
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">
						<h4 class="font-weight-bold">United Nations</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis explicabo quam id delectus alias unde, commodi quis assumenda odit inventore.</p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3 justify-content-end  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<img src="{{ asset('images/icons/recognition-3.png') }}" class="w-100">
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>
@endsection
