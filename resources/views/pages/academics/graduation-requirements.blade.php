@extends('template')
@section('seo')
<title>{{ $texts['meta-title']}}</title>
<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
<meta itemprop="title" property="og:title" content="{{ $texts['meta-title']}}"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="{{ $texts['meta-description']}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>

<x-seo.web-page-schema :url="route('graduation-requirements')" :name="$texts['heading']" :description="$texts['meta-description']" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => $texts['heading'], 'url' => route('graduation-requirements')]]" />

@endsection


@section('headCSS')
	<style>
	.requirements-section {
      padding: 30px;
      color:white;
      background: #045397;
      margin:40px 0;
      border-radius:15px;
    }
    .requirements-section hr{
      border-top:2px solid white;
    }
    .accordion-block {
      max-width: 900px;
      margin: 0 auto 24px auto; /* spacing between blocks */
    }

    .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .card-header {
      background: #fff;
      border: none;
      padding: 0!important;
    }

    .btn-accordion {
      width: 100%;
      text-align: left;
      background: #fff;
      color: #00529b;
      font-weight: 700;
      font-size: 1.4rem;
      padding: 1rem 1.5rem;
      border: none;
      border-radius: 10px;
    }

    .btn-accordion:focus {
      box-shadow: none;
    }

    .card-body {
      background: #fff;
      padding: 1.25rem 1.5rem 1.5rem;
      border-top: 1px solid #ddd;
    }

		
    table {
        width: 100%;
        border-collapse: collapse;
      
        font-size: 1.1rem;
        color: #222;
        border: 1px solid #ccc;
    }

    table th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        vertical-align: middle;
      
    }
    table th p,
    table td p {
      margin-bottom:0;	
    }
    table thead th {
        background-color: #5282b9;
        color: #fff;
        font-weight: bold;
        padding: 10px;
    }

    table tbody tr:nth-child(odd) {
        background-color: #e9f1f9;
    }

    table tbody tr:nth-child(even) {
        background-color: #fff;
    }

    table tbody tr:hover {
        background-color: #d9e7f5;
    }

	</style>
@endsection

@section('content')
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ ucwords(str_replace('-', ' ', request()->segment(1))) }}</li>
		</ol>
	</div>

  <x-image-component nickname="empty-classroom-rows-of-desks" class="main-pictures-pages"/>

	<div class="container page-content">
		<h1 class="text-center page-headings">{{ $texts['heading'] }}</h1>
   
    {{-- <p class="mt-5">{{ $texts['intro'] }}</p> --}}
	</div>

  <div class="container page-content">
    {!! $texts['last-paragraph'] !!}
  </div>
 
  <x-three-buttons />
  <br>
@endsection
