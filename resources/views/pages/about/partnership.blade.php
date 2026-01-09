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
		<li class="breadcrumb-item active" aria-current="page">Education Partners & Companies</li>
	</ol>
</div>

<img src="{{ asset('images/education-and-partnership.png') }}" alt="">
<div class="container-fluid ">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white page-content" style="padding:30px;">
			<h1 class="page-headings" id="start">Education Partners & Companies</h1>
			<div class="text-justify page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer </div>
			<br>
			<hr style="border:1px solid #045397">
			<div class="row">
				<div class="col-md-3">
					<img src="{{ asset('images/partnership-1.png') }}" alt="">
				</div>
				<div class="col-md-9 d-flex align-items-center">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus libero mollitia ratione dolore facere, nesciunt voluptatem voluptate consectetur et fuga blanditiis culpa cumque, hic ea fugit quia ut sed.</p>
				</div>
			</div>
			<hr style="border:1px solid #045397">
			<div class="row">
				<div class="col-md-9 d-flex align-items-center">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus libero mollitia ratione dolore facere, nesciunt voluptatem voluptate consectetur et fuga blanditiis culpa cumque, hic ea fugit quia ut sed.</p>
				</div>
				<div class="col-md-3">
					<img src="{{ asset('images/partnership-3.png') }}" alt="">
				</div>
			</div>
			<hr style="border:1px solid #045397">
			<div class="row">
				<div class="col-md-3">
					<img src="{{ asset('images/partnership-2.png') }}" alt="">
				</div>
				<div class="col-md-9 d-flex align-items-center">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus libero mollitia ratione dolore facere, nesciunt voluptatem voluptate consectetur et fuga blanditiis culpa cumque, hic ea fugit quia ut sed.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
