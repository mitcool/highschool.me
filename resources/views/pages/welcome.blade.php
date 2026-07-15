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
		"@graph": [
			{
				"@type": "EducationalOrganization",
				"@id": "{{ route('welcome') }}#organization",
				"name": "ONSITES High School",
				"alternateName": "HIGHSCHOOL.ME",
				"url": "{{ route('welcome') }}",
				"logo": {
					"@type": "ImageObject",
					"url": "{{ asset('images/onsites-graduate-school-logo.png') }}"
				},
				"telephone": "+1-305-404-5125",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "100 Southeast 2nd Street, Miami Tower, Suite 2000-1005",
					"addressLocality": "Miami",
					"addressRegion": "FL",
					"postalCode": "33131",
					"addressCountry": "US"
				},
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+1-305-404-5125",
					"contactType": "customer service",
					"availableLanguage": ["English"]
				}
			},
			{
				"@type": "WebSite",
				"@id": "{{ route('welcome') }}#website",
				"url": "{{ route('welcome') }}",
				"name": "HIGHSCHOOL.ME",
				"publisher": {
					"@id": "{{ route('welcome') }}#organization"
				}
			},
			{
				"@type": "WebPage",
				"@id": "{{ route('welcome') }}#webpage",
				"url": "{{ route('welcome') }}",
				"name": @json($texts['meta-title']),
				"description": @json($texts['meta-description']),
				"isPartOf": {
					"@id": "{{ route('welcome') }}#website"
				},
				"about": {
					"@id": "{{ route('welcome') }}#organization"
				}
			}
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

