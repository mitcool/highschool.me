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
@php
    $breadcrumb_title = strtok(trans('study-registration.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="study_registration" class="study_registration-images main-pictures-pages" loading="eager"/>
	<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 shadow text-center p-4" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold">{{ trans('study-registration.heading') }}</h1><hr>
			

				</div>
		</div>
	</div>
@endsection

