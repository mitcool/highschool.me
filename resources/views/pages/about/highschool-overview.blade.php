@extends('template')

@section('seo')
	<title>{{ $texts['meta-title']}}</title>
	<meta itemprop="description" name="description" content="{{ trans('digital-studies.meta-description')}}" />

	<meta itemprop="title" property="og:title" content="{{ trans('digital-studies.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('school-overview')}}"/>
	<meta property="og:description" content="{{ trans('digital-studies.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>
@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
	</ol>
</div>

<x-image-component nickname="us-flag" class="digital_studies-images main-pictures-pages"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white">
			<section>
				<h1 class="page-headings text-center">{{ $texts['heading'] }}</h1>
				{!! $texts['content'] !!}
			</section>
			<x-three-buttons/>
			
			{{-- <div class="d-flex justify-content-center">
				<iframe width="800" height="450" src="https://www.youtube.com/embed/TZRz1KtPfN8?si=1SCyQX_SWoWm-MfL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div> --}}
		</div>
	</div>
</div>

<br>
@endsection
