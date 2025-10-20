@extends('template')

@section('seo')
<title>{{ trans('recognition.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('recognition.meta-description')}}" />

<meta itemprop="title" property="og:title" content="{{ trans('recognition.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/studium-verkuerzen"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/recognition-of-prior-learning"/>
@endif
<meta property="og:description" content="{{ trans('recognition.meta-description')}}"/>
<x-meta-image itemprop="image" nickname="recognition_of_previous_achievemnts"/>

<link rel="alternate" href="{{ config('app.url') }}/en/recognition-of-prior-learning" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/studium-verkuerzen" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/recognition-of-prior-learning" hreflang="x-default" />
@endsection




@section('content')
@php
    $breadcrumb_title = strtok(trans('recognition.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="recognition_of_previous_achievemnts" class="recognition_of_previous_achievemnts-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{ trans('recognition.heading') }}</h1>
			<div class="page-content">{!! trans('recognition.text') !!}</div>

			<div class="row">
				<div class="col-md-12 my-2">
					<!-- <div class="h-100">
						<div class="row h-100" style="margin:0px;">
							<div class="col-md-2 p-3 d-flex justify-content-center align-items-center">
								<x-image-component nickname="recognition_of_previous_achievemnts_four" class="recognition_of_previous_achievemnts_four-images" style="height: 50px; padding-left: 10px;"/>
								
							</div>
							<div class="col-md-10 d-flex justify-content-center align-items-start flex-column p-2">
								<h6>{{trans('recognition.first-image-heading')}}</h6>
								<p class="m-0">{{trans('recognition.first-image-text')}}</p>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-md-12 my-2">
					<div class="h-100">
						<div class="row h-100" style="margin:0px;">
							<div class="col-md-2 p-3 d-flex justify-content-center align-items-center">
								<x-image-component nickname="recognition_of_previous_achievemnts_three" class="recognition_of_previous_achievemnts_two-images" style="height: 50px; padding-left: 10px;"/>
							</div>
							<div class="col-md-10 d-flex justify-content-center align-items-start flex-column p-2">
								<h4>{!!trans('recognition.second-image-heading')!!}</h4>
								<p class="m-0">{!!trans('recognition.second-image-text')!!}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 my-2">
					<div class="h-100">
						<div class="row h-100" style="margin:0px;">
							<div class="col-md-2 p-3 d-flex justify-content-center align-items-center">
								<x-image-component nickname="recognition_of_previous_achievemnts_one" class="recognition_of_previous_achievemnts_three-images" style="height: 50px; padding-left: 10px;"/>
							</div>
							<div class="col-md-10 d-flex justify-content-center align-items-start flex-column p-2">
								<h4>{!!trans('recognition.third-image-heading')!!}</h4>
								<p class="m-0">{!!trans('recognition.third-image-text')!!}</p>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-12 my-2">
					<div class="h-100">
						<div class="row h-100" style="margin:0px;">
							<div class="col-md-2 p-3 d-flex justify-content-center align-items-center">
								<x-image-component nickname="recognition_of_previous_achievemnts_two" class="recognition_of_previous_achievemnts_four-images" style="height: 50px; padding-left: 10px;"/>
							</div>
							<div class="col-md-10 d-flex justify-content-center align-items-start flex-column p-2">
								<h6>{{trans('recognition.fourth-image-heading')}}</h6>
								<p class="m-0">{{trans('recognition.fourth-image-text')}}</p>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-md-12 my-2">
					<div class="h-100">
						<div class="row h-100" style="margin:0px;">
							<div class="col-md-2 p-3 d-flex justify-content-center align-items-center">
								<x-image-component nickname="recognition_of_previous_achievemnts_five" class="recognition_of_previous_achievemnts_four-images" style="height: 50px; padding-left: 10px;"/>
							</div>
							<div class="col-md-10 d-flex justify-content-center align-items-start flex-column p-2">
								<h4>{!!trans('recognition.fifth-image-heading')!!}</h4>
								<p class="m-0">{!!trans('recognition.fifth-image-text')!!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection