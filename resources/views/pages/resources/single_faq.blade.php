@extends('template')

@section('seo')
	<title>{{ $faq_category_questions->translated->meta_title }}</title>
	<meta itemprop="description" name="description" content="{{ $faq_category_questions->translated->meta_description }}">

	<meta itemprop="title" property="og:title" content="{{ $faq_category_questions->translated->meta_title }}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/faq/{{ $hreflang_de }}"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/faq/{{ $hreflang_en }}"/>
	@endif
	<meta property="og:description" content="{{ $faq_category_questions->translated->meta_description }}"/>

	<script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            @foreach($faq_category_questions->faqs as $q)
              {
                "@type": "Question",
                "name": "@php echo strip_tags($q->translated->question) @endphp",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "@php echo strip_tags($q->translated->answer) @endphp"
                }
              }@if (!$loop->last) , @endif
            @endforeach
        ]
      }
    </script>

    <link rel="alternate" href="{{ config('app.url') }}/en/faq/{{ $hreflang_en }}" hreflang="en" />
    <link rel="alternate" href="{{ config('app.url') }}/de/faq/{{ $hreflang_de }}" hreflang="de" />
    <link rel="alternate" href="{{ config('app.url') }}/en/faq/{{ $hreflang_en }}" hreflang="x-default" />

@endsection



@section('content')
@php
    $breadcrumb_title = strtok($faq_category_questions->translated->meta_title, '|');
@endphp
<div aria-label="breadcrumb" class="col-md-10 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-1">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<div class="container-fluid main_page_container bg-light">
	<div class="row">
		<div class="col-md-10 offset-md-1 p-3">
			<h1 class="page-headings">FAQ - {{$faq_category_questions->translated->name}}</h1>
			@foreach($faq_category_questions->faqs as $faq)
			
				<h2>{{ $faq->translated->question }}</h2>
				<p>{!! $faq->translated->answer !!}</p>
					
				<hr>
			@endforeach
		</div>
	</div>
</div>
@endsection