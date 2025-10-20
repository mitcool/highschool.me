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


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/accreditation-partners" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/akkreditierung-und-partner" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('accreditation.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="accreditation-cover" id="cover" class="main-pictures-pages" loading="eager" />
<div class="container-fluid main_page_container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings" id="start">{{trans('accreditation.heading')}}</h1>
			<div class="text-justify page-content">{!! trans('accreditation.text') !!}</div>
			{{--<br>
				<div class="text-center" style="padding:30px;">
				<x-image-component nickname="accreditation" class="accreditation-images accreditation-certificate"/>
			</div>--}}
			<br>
			<h2 class="section-headings">{{trans('accreditation.our-partners')}}</h2>
			<div class="page-content">{!! trans('accreditation.our-partners-text') !!}</div>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-3 justify-content-center  d-flex align-items-center image-accreditation" id="collegium-humanum">
					<div>
						<x-image-component id="{{ $partners[0]->id }}" nickname="partner-{{ $partners[0]->id }}" class="w-100"/>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center ">
					<div class="text p-2 page-content">{!! $partners[0]->translated->text !!}</div>
				</div>
			</div>
			<br>

			<div class="row">
				<div id="second" class="col-12 col-md-12 col-lg-9 d-flex align-items-center">
					<div class="text p-2 page-content">{!! $partners[1]->translated->text !!}</div>
				</div>
				<div id="first" class="col-12 col-md-12 col-lg-3 d-flex align-items-center image-accreditation">
					<div>
						<x-image-component id="{{ $partners[1]->id }}" nickname="partner-{{ $partners[1]->id }}" class="w-100"/>
					</div>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-3 d-flex align-items-center image-accreditation">
					<div>
						<x-image-component id="{{ $partners[4]->id }}" nickname="partner-{{ $partners[4]->id }}" class="w-100"/>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-9 d-flex align-items-center">
					<div class="text p-2 page-content">{!! $partners[4]->translated->text !!}</div>
				</div>
			</div>
			<br>

			<div class="row ">
				<div id="second" class="col-12 col-md-12 col-lg-9 d-flex align-items-center">
					<div class="text p-2 page-content">{!! $partners[2]->translated->text !!}</div>
				</div>
				<div id="first" class="col-12 col-md-12 col-lg-3 d-flex align-items-center image-accreditation">
					<div>
						<x-image-component id="{{ $partners[2]->id }}" nickname="partner-{{ $partners[2]->id }}" class="w-100"  />
					</div>
				</div>
				
			</div>
			<br>

			<div class="row">
				<div id="first" class="col-12 col-md-12 col-lg-3 d-flex align-items-center image-accreditation">
					<div>
						<x-image-component id="{{ $partners[3]->id }}" nickname="partner-{{ $partners[3]->id }}" class="w-100"/>
					</div>
				</div>
				<div id="second" class="col-12 col-md-12 col-lg-9 d-flex align-items-center">
					<div class="text p-2 page-content">{!! $partners[3]->translated->text !!}</div>
				</div>
			</div>
			<br>

		</div>
	</div>
</div>
@endsection
