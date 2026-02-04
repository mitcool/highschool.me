@extends('template')

@section('seo')
	<title>{{ trans('study-registration.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
	<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
	<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/bewerbung-studium"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-portal"/>
@endif
	<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection

@section('headCSS')
	<style>

	</style>
@endsection

@section('content')
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Credit Recovery</li>
		</ol>
	</div>

	<x-image-component nickname="study_registration" class="study_registration-images main-pictures-pages" loading="eager"/>

	<div class="container-fluid bg-white pb-4">	
		<div class="row justify-content-center">		
			<div class="col-lg-8 text-center p-4" style="margin: 0 auto;">
				<h1 class="text-center page-headings">Credit Recovery</h1>
				<div class="page-content">
	                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
	                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
	                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
	                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
	            </div>
			</div>
		</div>

		<x-three-buttons/>
	</div>
@endsection
