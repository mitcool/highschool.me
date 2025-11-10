@extends('template')


@section('seo')
	<title>{{ $feature->feature}}</title>
	<meta itemprop="description" name="description" content="" />

	<meta itemprop="title" property="og:title" content=""/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/imprint"/>
	<meta property="og:description" content=""/>
	<x-meta-image itemprop="image" nickname="imprint"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/imprint" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/impressum" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/imprint" hreflang="x-default" />
@endsection
@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/imprint" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/impressum" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $feature->feature }}</li>
	</ol>
</div>

<x-image-component nickname="imprint" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8 container-style  bg-white">
			<h1 class="page-headings">{{$feature->feature}}</h1>
			<div class="page-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dicta assumenda quae nulla voluptatum non, beatae dolor praesentium inventore pariatur! Modi pariatur cumque, nam adipisci voluptatibus accusantium optio voluptate rerum.</div>
			
		</div>
	</div>
</div>

@endsection
