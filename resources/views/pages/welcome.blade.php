@extends('template')

@section('seo')
	<title>{{ trans('welcome.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('welcome.meta-description') }}">

	<meta itemprop="title" property="og:title" content="{{ trans('welcome.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	@if(app()->currentLocale() == 'de')
		<meta itemprop="url" property="og:url" content="https://graduate.me"/>
	@else
		<meta itemprop="url" property="og:url" content="https://graduate.me/en"/>
	@endif
	<meta property="og:description" content="{{ trans('welcome.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="main-image"/>

	@if(app()->currentLocale() == 'en')
		<script type="application/ld+json">
	      {
	        "@context": "https://schema.org",
	        "@type": "Organization",
	        "name": "ONSITES Graduate School",
	        "url": "https://graduate.me/en",
	        "logo": "https://graduate.me/public/images/logo.png",
	        "sameAs": [
	          
	        ]
	      }
	  	</script>
	@else
		<script type="application/ld+json">
	      {
	        "@context": "https://schema.org",
	        "@type": "Organization",
	        "name": "ONSITES Graduate School",
	        "url": "https://graduate.me",
	        "logo": "https://graduate.me/public/images/logo.png",
	        "sameAs": [
	          
	        ]
	      }
	  	</script>
	@endif

	<link rel="alternate" href="{{ config('app.url') }}/en" hreflang="en" />
	<link rel="alternate" href="https://graduate.me" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en" hreflang="x-default" />

@endsection


@section('content')

<main>
	<section class="container-fluid p-0">
		<x-home.slogan />
	</section>
	<div class="container-fluid m-0">
		<x-home.benefits />

		<x-home.testimonials/>

		<x-home.news />

		<x-home.reasons-accordion />

		{{-- <x-home.contact-form /> --}}
	</div>
</main>

@endsection


