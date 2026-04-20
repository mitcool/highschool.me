@extends('template')
@section('seo')
<title>{{ $texts['meta-title']}}</title>
<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
<meta itemprop="title" property="og:title" content="{{ $texts['meta-title']}}"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="{{ $texts['meta-description']}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>

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

    h2 {
      color: white!important;
    }
	</style>
@endsection

@section('content')
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
		</ol>
	</div>
	<img src="{{ asset('/images/grad-requirements.png') }}" class="w-100">
	<div class="container page-content">
		<h1 class="text-center page-headings">{{ $texts['heading'] }}</h1>
    <h4 class="text-center">{{ $texts['subheading'] }}</h4>
    <p class="mt-5">{{ $texts['intro'] }}</p>
	</div>
  <div class="container page-content">
      <section class="requirements-section">
        {!! $texts['requirement-1'] !!}
	    </section>
      <section class="requirements-section">
         {!! $texts['requirement-2'] !!}
	    </section>
      <section class="requirements-section">
          {!! $texts['requirement-3'] !!}
	    </section>
  </div>
  <div class="container page-content">
    {!! $texts['last-paragraph'] !!}
  </div>
 
  <x-three-buttons />
  <br>
@endsection
