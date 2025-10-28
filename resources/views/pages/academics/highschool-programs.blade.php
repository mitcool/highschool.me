@extends('template')
@section('seo')
<title></title>
<meta itemprop="description" name="description" content="" />
<meta itemprop="title" property="og:title" content=""/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/highschool-programs"/>
<meta property="og:description" content=""/>
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
<x-image-component nickname="courses-cover" class="study_registration-images main-pictures-pages" loading="eager"/>
	<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 text-center p-4 bg-white" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold page-headings">{{ trans('study-registration.heading') }}</h1><hr>
				<div class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</div>
				<h2 class="text-center font-weight-bold page-headings">Discover our interesting Cources</h2><hr>
				<div class="row">
					@foreach ($courses as $course)
						<div class="col-md-4 my-3">
							<div class="shadow">
								<x-image-component nickname="course-{{ $course->id }}" class="w-100"/>
								<div class="d-flex align-items-center justify-content-between mt-4 p-3">
									<p class="font-weight-bold m-0">{{ $course->name }}</p>
									<a href="" class="btn orange-button">Read more</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
@endsection


