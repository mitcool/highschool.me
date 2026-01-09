@extends('template')

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
		<li class="breadcrumb-item active" aria-current="page">{{ $course->course->title }}</li>
	</ol>
</div>

<img src="{{ asset('images/education-and-partnership.png') }}" alt="">
<div class="container-fluid ">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white page-content shadow" style="padding:30px;margin:20px 0;">
			<h1 class="page-headings" id="start">{{ $course->course->title }}</h1>
			<div class="text-justify page-content " style="padding:20px;">
                <div class=""><span class="font-weight-bold">Code: </span> {{ ($course->course->fldoe_course_code) }} </div>
                <div class=""><span class="font-weight-bold">Credits: </span>  {{ ($course->course->default_credits) }}</div>
            </div>
			<br>
			<x-three-buttons/>
			
		</div>
	</div>
</div>
@endsection
