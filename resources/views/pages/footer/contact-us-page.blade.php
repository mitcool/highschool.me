@extends('template')

@section('seo')
	<title>{{trans('contact-us.meta-title')}}</title>
	<meta itemprop="title" property="og:title" content="{{trans('contact-us.meta-title')}}"/>

	<meta property="og:title" content="{{trans('contact-us.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/contact"/>
	
	<meta itemprop="description" property="og:description" content="{{trans('contact-us.meta-title')}}"/>
	<x-meta-image itemprop="image" nickname="contact-form-background"/>

	<meta name="description" content="{{ trans('contact-us.meta-description') }}" />
	
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/contact" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/kontakt" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection
@section('headCSS')
<style>	
	.tooltip.show {
  		opacity: 1;
	}
	.tooltip-inner {
		display: flex;
		align-items: center;
    	justify-content: center;
    	max-width: 350px;
    	width: 250px;
		padding: 1rem !important;
		color: black !important;
		background:white !important;
		color: rgba(0, 0, 0, 1);
		box-shadow: 0px 0px 27px -1px rgba(66, 68, 90, 1);
		border: 0px solid black !important;
	}
	.bs-tooltip-auto[x-placement^=right] .arrow::before,
	.tooltip.right .arrow::before {
		border-right-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=left] .arrow::before,
	.bs-tooltip-left .arrow::before	{
		border-left-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=top] .arrow::before,
	.bs-tooltip-top .arrow::before {
		border-top-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=bottom] .arrow::before,
	.bs-tooltip-bottom .arrow::before {
		border-bottom-color: #EF6024 !important;
	}

	.contact-wrapper h1{
		font-size:2rem;
	}
	.contact-wrapper h2{
		font-size:1.6rem;
	}
	.contact-wrapper h3{
		font-size:1.1rem;
	}
	.contact-wrapper h1,
	.contact-wrapper h2,
	.contact-wrapper h3{
		color:#2980B9;
		
	}
	.contact-wrapper h3{
		margin-bottom:20px;
		
	}
	.contact-wrapper h1,
	.contact-wrapper h2{
		margin:20px 0;
		padding:10px;
	}
	.contact-wrapper{
		padding:50px;
	}
	#contact-form input,
	#contact-form select,
	#contact-form textarea{
		background:#F3FAFF;
		border:none;
	}
</style>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('contact-us.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="contact-form-background" class="w-100" loading="eager"/>

<div class="container-fluid main_page_container ">
	<div class="row justify-content-center ">
		<div class="col-md-10 container-style contact-wrapper text-center bg-white">
			<h1>Send us a message</h1>
			<div class="page-content">Welcome to our contact page. We are glad that you have found your way here. If you have queries, requests or feedback, we are there for you. Your opinion is important to us because it helps us to improve our services. You can reach us in several ways. Simply use the contact form below and click on the relevant section. We want to help you find our way around our contact page, so we’ve listed the most requested sections below.</div>
			
		

			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="background-color:#025297;padding:20px;">
		<h2 class="text-white text-center">{!! trans('contact-us.second-heading') !!}</h2>
		<div class="row text-center">
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
			<div class="col-md-4" >
				<div style="background-color:#EF6024;color:white;padding:20px;margin:20px 0 ;">
					<h3>Bla Bla Bla</h3>
				</div>
				
			</div>
		</div>
</div>
<div class="col-md-10">
	
</div>
	<div class="row jumbotron mx-auto">
				<div class="col-md-6">
					<form action="/send-email-modal" method="POST"  id="contact-form">
			  		{{csrf_field()}}
						<div class="row">
							<div class="col-lg-12">
								<h4>Contact Us</h4>
							</div>
							<div class="col-lg-12 my-2">
								<input autocomplete="off" value="{{ old('name_request') }}" required type="text" name="name_request" placeholder="{{ trans('contact-us.name-placeholder') }}" class="form-control w-100 @error('name_request') is-invalid @enderror">
								@error('name_request') <span class="validation-error">{!! $errors->first('name_request') !!}</span> @enderror
		
							</div>
							<div class="col-lg-12 my-2">
								<input autocomplete="off" value="{{ old('email_request') }}" required type="email" name="email_request" placeholder="{{ trans('contact-us.email-placeholder') }}"  class="form-control w-100  @error('email_request') is-invalid @enderror" >
								@error('email_request') <span class="validation-error">{{ $errors->first('email_request') }}</span> @enderror
							</div>
							
							<div class="col-lg-12 text-center">
								<textarea autocomplete="off" required rows="10" name="message" placeholder="{{trans('contact-us.message-placeholder')}}" class="form-control w-100 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
								@error('message') <span class="validation-error">{{ $errors->first('message') }}</span> @enderror
								
								
								<label class="ohnohoney" for="name"></label>
								<input class="ohnohoney" autocomplete="off" type="text" id="name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
								<label class="ohnohoney" for="email"></label>
								<input class="ohnohoney" autocomplete="off" type="email" id="email" name="email" placeholder="{{trans('modals.cookies-accept-button')}}">
								<input type="hidden" name="age">
								<button class="orange-button btn mt-3" style="border-radius: 30px;">{!! trans('contact-us.send-button') !!}</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<h4>Send us a message</h4>
					<p>Welcome to our contact page. We are glad that you have found your way here. If you have queries, requests or feedback, we are there for you. Your opinion is important to us because it helps us to improve our services. You can reach us in several ways. Simply use the contact form below and click on the relevant section. We want to help you find our way around our contact page, so we’ve listed the most requested sections below.</p>
				</div>
			</div>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
@endsection
