@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('leadership') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>
	<x-seo.web-page-schema :url="route('leadership')" :name="$texts['heading']" :description="$texts['meta-description']" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => $texts['heading'], 'url' => route('leadership')]]" />
@endsection

@section('headCSS')
	<style>
		@media(max-width:1200px){
			.benefit-wrapper{
				margin-top:15px;
			}
		}
		.video iframe{
			width:100%;
			height:auto;
			aspect-ratio:16 / 9;
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

<div class="container-fluid bg-white main_page_container mb-3">	
    <div class="row justify-content-center" >		
        <div class="col-lg-8  p-4 page-content bg-white text-justify" style="margin: 0 auto;">
            <div class="page-content">
                <div class="">
                    <h1 class="text-center page-headings">{{ $texts['heading'] }}</h1>
                    <hr class="white-hr">
                    <div class="w-100 centered text-center mx-auto mb-5">
                        <img src="{{ asset('images/mathias-kunze-leadership.webp') }}" class="w-100" alt="">
                    </div>
                    <div class="video mt-1 mb-5 w-75 mx-auto">
                        <iframe width="100%" src="https://www.youtube.com/embed/a025DL3Zep0?si=aMjbEH8fGRilDVns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                       {!! $texts['content'] !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
