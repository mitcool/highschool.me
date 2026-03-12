@extends('template')

@section('seo')
	<title>{{ trans('accreditation.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('accreditation.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{ trans('accreditation.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/accreditation-partners"/>
	<meta property="og:description" content="{{ trans('accreditation.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

@endsection

@section('headCSS')
	<style>
		.iso-actions {
			text-align: center;
		}
		.iso-show-all {
			display: inline-block;
			background: #005aa7;
			color: #fff;
			padding: 10px 28px;
			border-radius: 28px;
			font-size: 18px;
			font-weight: 700;
			text-decoration: none;
			line-height: 1;
		}
		.iso-show-all:hover,
		.iso-show-all:focus {
			color: #fff;
			text-decoration: none;
		}
	</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('accreditation') }}">Recognition & Quality Standards</a></li>
		<li class="breadcrumb-item active" aria-current="page">Information Security Management Systems</li>
	</ol>
</div>

<div class="container-fluid main_page_container pt-0">
	<div class="row justify-content-center">
		<div class="mb-4 text-center">
			<img src="{{ asset('images/recognition-pages/cover-iso-2022.webp') }}">
		</div>
		<div class="col-md-10 col-lg-8 mb-4 text-center">
			<h1>ISO 27001:2022</h1>
			<p class="text-justify">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus orci mauris, in fringilla turpis sagittis ut. Suspendisse ultrices aliquam elit, quis faucibus magna dignissim sit amet. Sed fermentum cursus elit, at scelerisque tellus luctus non. Duis non gravida nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent in volutpat enim, et aliquam leo. Suspendisse pellentesque sagittis sem, sed viverra diam. In suscipit sit amet ante eget tristique. Etiam finibus purus ut nulla condimentum maximus. Phasellus sollicitudin cursus purus. Donec venenatis eleifend lacus, ac interdum est elementum quis. Nullam ultricies semper nisl, sed consectetur turpis pulvinar non. Donec posuere mauris velit, eget placerat tellus vulputate quis. Nullam condimentum odio vel rhoncus consequat. Duis euismod ligula sit amet velit ullamcorper convallis. Duis non justo eu neque molestie tincidunt. Nunc in felis at leo laoreet pellentesque. In hac habitasse platea dictumst. Cras vel lobortis arcu. Mauris gravida enim nulla. In hac habitasse platea dictumst. Morbi interdum urna sed mauris maximus egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ornare efficitur libero eu consequat. Duis eget mi leo. Aenean vulputate ac justo suscipit consequat. Donec semper tellus porttitor iaculis euismod. Aenean dignissim nunc ipsum, vitae sodales nisi venenatis at. Maecenas dapibus elit a ex laoreet venenatis. Donec ut sapien imperdiet orci cursus congue a ut nulla. Donec faucibus nisi a porta malesuada. Morbi interdum efficitur nunc, in commodo quam venenatis sit amet. Suspendisse aliquet placerat blandit. Nunc commodo vulputate velit blandit efficitur. Nullam et commodo felis. Pellentesque bibendum suscipit tincidunt.
			</p>
		</div>
	</div>
	<div class="iso-actions pb-5">
		<a href="{{ route('accreditation') }}" class="iso-show-all">Show All</a>
	</div>
</div>
@endsection
