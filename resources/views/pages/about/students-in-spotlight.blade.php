@extends('template')


@section('seo')
<title>{{ $texts['meta-title'] }}</title>
<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />

<meta itemprop="name" property="og:title" content="{{ $texts['meta-title'] }}"/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content="{{ route('students-in-spotlight') }}"/>
<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
<x-meta-image itemprop="image" nickname="about-cover"/>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "@id": "{{ route('students-in-spotlight') }}#webpage",
    "url": "{{ route('students-in-spotlight') }}",
    "name": "Students in Spotlight",
    "description": @json($texts['meta-description']),
    "isPartOf": {
        "@type": "WebSite",
        "@id": "{{ route('welcome') }}#website",
        "url": "{{ route('welcome') }}",
        "name": "ONSITES Graduate School"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ route('welcome') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Students in Spotlight",
                "item": "{{ route('students-in-spotlight') }}"
            }
        ]
    }
}
</script>

@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Students in Spotlight</li>
	</ol>
</div>

<x-image-component nickname="student-spotlight" id="cover" class="main-pictures-pages" loading="eager"/>

<x-coming-soon />

<div class="container-fluid">

</div>
@endsection
