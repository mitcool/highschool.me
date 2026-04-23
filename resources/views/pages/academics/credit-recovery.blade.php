@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('credit-recovery')}}"/>
	<meta property="og:description" content="{{ $texts['meta-description']}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection

@section('headCSS')
<style>
    .heading-container {
        margin: 0 auto;
    }
    .content-container {
        background-color: white;
    }
    .page-content {
        margin: 0 auto;
    }
    .highschool-content {
        margin: 0 auto;
        padding: 25px 0;
    }
    .check-marks-container {
        padding: 25px 0;
    }
    .check-marks-container ul li{
        list-style: none;
        padding: 10px 35px;
        background-image: url("/images/orange-checkmark.webp");
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 25px;
        text-align: left;
        width: fit-content;
        max-width: 900px;
        margin: 0 auto;
    }
	.page-content h2,
	.page-content h3{
		color:#045397;
		text-align: center;
	}
</style>
@endsection

@section('content')
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $texts['breadcrumb'] }}</li>
		</ol>
	</div>

	<x-image-component nickname="four-diverse-students-sharing-tablet" class="study_registration-images main-pictures-pages" loading="eager"/>

	<div class="container-fluid p-0">
	    <div>
	        <div class="text-center">
	            <div class="col-md-8 heading-container">
	                <h1 class="page-headings">{{ $texts['heading'] }}</h1>
	                <div class="text-center mb-5">
	                </div>
	            </div>
	            <div class="content-container">
	                <div class="col-md-8 text-justify highschool-content page-content">
						{!! $texts['content'] !!}
	                </div>
	            </div>
	        </div>
	    </div>
	    {{-- <div class="check-marks-container text-center">
	        <ul>
	            <li>{{ $texts['list-1'] }}</li>
	            <li>{{ $texts['list-2'] }}</li>
	            <li>{{ $texts['list-3'] }}</li>
	            <li>{{ $texts['list-4'] }}</li>
	            <li>{{ $texts['list-5'] }}</li>
	        </ul>
	    </div>

	    <div class="text-center">
	            <div class="content-container">
	                <div class="col-md-8 text-justify highschool-content">
						{{ $texts['last-paragraph'] }}
	                </div>
	            </div>
	        </div>
	    </div> --}}

	    <x-three-buttons/>
	</div>
@endsection
