@extends('template')


@section('seo')
	<title>{{trans('imprint.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('imprint.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{trans('imprint.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/imprint"/>
	<meta property="og:description" content="{{ trans('imprint.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="imprint"/>

	<x-seo.web-page-schema :url="url()->current()" name="Imprint" :description="trans('imprint.meta-description')" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => 'Imprint', 'url' => url()->current()]]" />

@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Imprint</li>
	</ol>
</div>

<x-image-component nickname="imprint" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{trans('imprint.heading')}}</h1>
			<div class="page-content">{!! trans('imprint.text') !!}</div>
			
		</div>
	</div>
</div>

@endsection
