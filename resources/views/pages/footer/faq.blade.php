@extends('template')

@section('headCSS')

<style type="text/css">
	.faq-heading{
		background-color: #EE6123 !important;
		color:white;
		display:block;
		width: 50%;
		padding:10px;
		margin:10px auto;
		border-radius: 10px;
	}
	.faq-heading:hover{
		background-color: #EE6123 !important;
		text-decoration: none;
		color: white;
	}
	@media only screen and (max-width: 900px) {
		.faq-heading{
			width: 80%;
		}

	}
</style>
@endsection

@section('seo')
	<title>{{trans('faq.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('faq.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{trans('faq.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/faq"/>
	<meta property="og:description" content="{{ trans('faq.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="faqs"/>
@endsection



@section('content')
@php
    $breadcrumb_title = strtok(trans('faq.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="faqs" class="faqs-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 ">
			
			<h1 class="page-headings">{{trans('faq.heading')}}</h1><br>
			@foreach($faqcategories as $category)
			<a class="faq-heading" href="{{route('single-faq-category',[$category->slug])}}">
				<h2 data-toggle="collapse" data-target="#collapseExample_faq" aria-expanded="false" aria-controls="collapseExample" class="pl-2 m-0" style="font-size:1.5rem;">{{$category->name}}</h2>
			</a>
			@endforeach
		</div>
	</div>
</div>
@endsection
