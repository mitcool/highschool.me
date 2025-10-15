@extends('template')

@section('seo')
<title>{{ $study->translated->meta_title }}</title>
<meta itemprop="description" name="description" content="{{ $study->translated->meta_description }}">

<meta itemprop="title" property="og:title" content="{{ $study->translated->meta_title }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/{{ $hreflang_de }}"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/{{ $hreflang_en }}"/>
@endif
<meta property="og:description" content="{{ $study->translated->meta_description }}"/>
<x-meta-image itemprop="image" nickname="study-{{ $study->id }}"/>

<link rel="alternate" href="{{ config('app.url') }}/en/{{ $hreflang_en }}" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/en/{{ $hreflang_en }}" hreflang="x-default" />
<link rel="alternate" href="{{ config('app.url') }}/de/{{ $hreflang_de }}" hreflang="de" />

@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/{{ $hreflang_en }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/{{ $hreflang_de }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('headCSS')
<style type="text/css">
	.body {
		min-height: 40vh!important;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
		background-color: #FFF6E7;
		-webkit-box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		-moz-box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		text-shadow: 2px 2px black;
  		transition: 0.5s;
  		border: 3px solid transparent;
	}

	.transition-body {
		min-height: 40vh!important;
		border: 3px solid #FFF6E7;
		background-color: white;
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		opacity: 0.7;
  		text-shadow: 2px 2px black;
  		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
		transition: 0.5s;
	}

	.transition-body div {
		padding: 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
	}

	.trans-desc {
		display: none;
	}

	.trans-desc-visible {
		display: block;
		opacity: 1!important;
		color: white;
		text-shadow: 2px 2px black;
	}

	.link-to {
		color: white;
		text-decoration: none;
	}

	.link-to:hover {
		color: white;
		text-decoration: none;
		text-shadow: 2px 2px black;
	}
</style>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok($study->translated->meta_title, '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component loading="eager" nickname="study-{{ $study->id }}" class="main-pictures-pages" id="cover" style="width: 100%; height: 400px; object-fit: cover;" />

<div id="studies_container" class="container-fluid main_page_container" style="min-height: auto;">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings"> {{ $study->translated->heading }}</h1>
			<div class="page-content mb-2"> {!! $study->translated->description !!}</div>

			<h2 style="margin:50px 0;text-align:center;font-weight:bold;">{{ $study->translated->programs_heading }}</h2>

			<div class="row justify-content-around">
				@foreach($study->programs as $program)
					<div class="col-md-4">
						<div class="body" style="background-image: url( {{asset($program->image() )}});">
							<a href="{{route('programs-'.app()->currentLocale(), [$study->translated->slug, $program->translated->slug])}}" class="link-to">
								<h3><strong>{!! $program->translated->name !!}</strong></h3>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

			
@endsection

@section('footerScripts')
<script type="text/javascript">
	$( document ).ready(function() {
		$('.body').on({
			mouseenter: function () {
        		$(this).toggleClass('transition-body');
        		$(this).removeClass('body');
        		$(this).find('p').toggleClass('trans-desc-visible');
		    },
		    mouseleave: function () {
		        $(this).removeClass('transition-body');
		        $(this).toggleClass('body');
		        $(this).find('p').removeClass('trans-desc-visible');
		    }
		});
	});
</script>
@endsection
