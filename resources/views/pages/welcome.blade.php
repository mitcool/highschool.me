@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}">
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('welcome') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="main-image"/>

	<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "Organization",
		"name": "ONSITES Graduate School",
		"url": "{{ route('welcome') }}",
		"logo": "{{ asset('images/onsites-graduate-school-logo.png') }}",
		"sameAs": [
			
		]
		}
	</script>
@endsection


@section('content')

<main>
	<section class="container-fluid p-0">
		<x-home.slogan />
	</section>
	<div class="container-fluid m-0">

		<x-home.mission />

		<x-home.benefits />

		<x-home.about />

		<x-home.facts />

		<x-home.recognition />

		<x-home.tracks />

		<x-home.edge />

		<x-home.journey />

		<x-home.media/>

		{{-- <x-home.accreditation/> --}}

		<x-home.testimonials/>

		<x-home.news />

		<x-home.contact />

		{{-- <x-home.contact-form /> --}}
	</div>
</main>

@endsection

@section('footerScripts')
<script>
	$('.benefit-box').on('mouseenter',function(){
		$(this).css('transform', 'scale(1.1, 1.1)').css('transition','0.4s').css('font-size:1.1rem;')
	})
	$('.benefit-box').on('mouseleave',function(){
		$(this).css('transform', 'none').css('transition','0.4s')
	})
</script>
@endsection

