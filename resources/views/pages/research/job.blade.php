@extends('template')


@section('seo')
<title>{{ request()->segment(1) == 'de' ? $job->meta_title_de : $job->meta_title}}</title>
<meta itemprop="description" name="description" content="{{ request()->segment(1) == 'de' ? $job->meta_description_de : $job->meta_description}}" />

<meta itemprop="title" property="og:title" content="{{ request()->segment(1) == 'de' ? $job->meta_title_de : $job->meta_title}}"/>
<meta property="og:type" content="website"/>
{{--  When URL is ready --}}
{{-- @if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/coaching"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/coaching-services"/>
@endif --}}
<meta property="og:description" content="{{ request()->segment(1) == 'de' ? $job->meta_title_de : $job->meta_title}}"/>
<x-meta-image itemprop="image" nickname="job-{{ $job->id }}"/>

    {{--  When URL is ready --}}
{{-- <link rel="alternate" href="{{ config('app.url') }}/en/coaching-services" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/coaching" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/coaching-services" hreflang="x-default" /> --}}
@endsection

{{--  When URL is ready --}}
{{-- @section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/coaching-services" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/coaching" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection --}}

@section('content')
@php
    $breadcrumb_title = strtok(trans('coaching.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="job-{{ $job->id }}" class="coaching-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{{ request()->segment(1) == 'de' ?  $job->name_de : $job->name''}}}</h1>
			<div class="page-content">{!! { request()->segment(1) == 'de' ?  $job->description_de : $job->description''} !!}</div>
		</div>
	</div>
</div>

@endsection
